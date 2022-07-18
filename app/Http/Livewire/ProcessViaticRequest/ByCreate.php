<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\DestinationSite;
use App\Models\OriginSite;
use App\Models\ViaticRequestsSitesDetalle;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ByCreate extends Component
{
    public $viaticRequest;
    public $listSite;

    /**ATRIBUTOS */
    public $justification;
    public $origin;
    public $destination;
    public $start_date;
    public $end_date;

    //escuchadores de eventos
    protected $listeners = [
        'removeSite' => 'removeSite',
        'updateViaticRequest' => 'updateViaticRequest',
    ];

    public function __construct()
    {
        $this->listSite = array();
    }

    public function mount($viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
        $this->justification = $this->viaticRequest->justification;
        foreach ($this->viaticRequest->sites as $site) {
            $modelDestination = DestinationSite::find($site->id_destination_site);
            $modelOrigin = OriginSite::find($site->id_origin_site);
            array_push($this->listSite, [
                'id_origin_site' => $site->id_origin_site,
                'id_destination_site' =>  $site->id_destination_site,
                'start_date' => $site->start_date,
                'end_date' => $site->end_date,
                'name_origin' => $modelOrigin->name,
                'name_destination' => $modelDestination->name
            ]);
        }
    }

    public function render()
    {
        return view('livewire.process-viatic-request.by-create');
    }

    public function addSite()
    {
        $this->validate([
            'origin' => 'required',
            'destination' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $modelDestination = DestinationSite::find($this->destination);
        $modelOrigin = OriginSite::find($this->origin);
        array_push($this->listSite, [
            'id_origin_site' => $this->origin,
            'id_destination_site' =>  $this->destination,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'name_origin' => $modelOrigin->name,
            'name_destination' => $modelDestination->name
        ]);
        $this->reset([
            'origin',
            'destination',
            'start_date',
            'end_date'
        ]);
    }

    public function removeSite($indexArray)
    {
        unset($this->listSite[$indexArray]);
        $this->listSite;
    }

    public function updateViaticRequest()
    {
        /** VALIDACIONES */
        //Justificacion
        $this->validate([
            'justification' => 'required',
        ]);
        //Comisines
        if (count($this->listSite) < 1) {
            $this->addError('comission', __('messages.validation.comission'));
            return;
        }

        /* try { */
        DB::beginTransaction();
        $newState = EStateRequest::CREATED->getId();

        $viaticRequest = $this->viaticRequest;
        $viaticRequest->createNewTimeLine($newState);
        $viaticRequest->justification = $this->justification;
        $viaticRequest->request_by = auth()->user()->id;
        $viaticRequest->sw_state = $newState;
        $viaticRequest->save();
        //hay que eliminar los que ya existen
        $viaticRequest->sites()->delete();
        //se crean los nuevos sitios
        foreach ($this->listSite as $site) {
            $newDetalle = new ViaticRequestsSitesDetalle();
            $newDetalle->id_origin_site = $site['id_origin_site'];
            $newDetalle->id_destination_site = $site['id_destination_site'];
            $newDetalle->start_date = $site['start_date'];
            $newDetalle->end_date = $site['end_date'];
            $newDetalle->viatic_request_id = $viaticRequest->id;
            $newDetalle->save();
        }

        /**CORREOS ELECTRONICOS */
        $viaticRequest->sendEmail("Paso a aprobación por parte del jefe inmediato");
        /**____________________FIN CORREOS ELECTRONICOS_________________ */

        //mostrar el mensaje de que se creo correctamente
        $this->emit('requestSave', route('viatic.show', $viaticRequest->id));

        DB::commit();

        /*   } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        } */
    }
}
