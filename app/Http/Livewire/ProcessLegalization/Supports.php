<?php

namespace App\Http\Livewire\ProcessLegalization;

use App\Enums\EStateLegalization;
use App\Mail\LegalizationMailable;
use App\Models\SupportsLegalization;
use App\Models\TypeIdentification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Supports extends Component
{
    use WithFileUploads;

    public $legalization;

    /**Atributos del nuevo soporte */
    public $soporte;
    public $fechaFactura;
    public $totalFactura;
    public $tipoIdentificacion;
    public $numeroIdentificacion;
    public $descripcion;
    public $nombreEmpresa;
    public $aceptarTerminosCondiciones;

    public $totalLegalization;

    /**Listeners */
    protected $listeners = [
        'saveSupport' => 'saveSupport',
        'destroySupport',
        'sendSupports'
    ];

    public function mount($legalization)
    {
        $this->legalization = $legalization;
        $this->totalLegalization =  $this->legalization->calculateTotal();
    }

    public function render()
    {
        $this->totalLegalization =  $this->legalization->calculateTotal();
        return view('livewire.process-legalization.supports', [
            'supports' => SupportsLegalization::latest()
                ->where('legalization_id', $this->legalization->id)->get(),
            'TypeIdentifications' => TypeIdentification::latest()->get(),
        ]);
    }

    public function saveSupport()
    {
        $this->validate([
            'soporte'  => 'required|max:1024',
            'fechaFactura' => 'required',
            'totalFactura' => 'required|numeric',
            'tipoIdentificacion' => 'required',
            'numeroIdentificacion' => 'required',
            'descripcion' => 'required',
            'nombreEmpresa' => 'required',
        ]);

        /* try { */
        DB::beginTransaction();

        $support = new SupportsLegalization();
        $support->legalization_id = $this->legalization->id;
        $support->url = $this->soporte->store("public/legalizaciones/soportes/" . $this->legalization->id . "/");
        $support->created_by = auth()->user()->id;
        $support->date_factura = $this->fechaFactura;
        $support->total_factura = $this->totalFactura;
        $support->type_identification = $this->tipoIdentificacion;
        $support->number_identification = $this->numeroIdentificacion;
        $support->observation = $this->descripcion;
        $support->company = $this->nombreEmpresa;
        $support->save();

        $this->emit('responseUpload', true);
        $this->reset([
            'soporte',
            'fechaFactura',
            'totalFactura',
            'tipoIdentificacion',
            'numeroIdentificacion',
            'descripcion',
            'nombreEmpresa'
        ]);
        DB::commit();
        /*   } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseUpload', false);
        } */
    }
    public function destroySupport(SupportsLegalization $object)
    {
        Storage::delete($object->url);
        $object->delete();
    }

    public function sendSupports()
    {
        $this->validate([
            'aceptarTerminosCondiciones' => 'accepted:true',
        ]);

        $this->legalization->sw_state = EStateLegalization::SEND->getId();
        $this->legalization->save();

        /**CORREOS ELECTRONICOS */
        //enviar el correo electronico de que se creo un viatico
        $this->legalization->sendEmail("Pendiente aprobación jefe inmediato.");
        /**____________________FIN CORREOS ELECTRONICOS_________________ */

        $this->emit('responseSend', true, route('legalization.show', $this->legalization->id));
    }
}
