<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Enums\ETypeSupportLegalization;
use App\Models\ObservationViaticModel;
use App\Models\SupportsViaticRequests;
use App\Models\ViaticRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SupportPago extends Component
{
    use WithFileUploads;
    public ViaticRequest $viaticRequiest;

    public $newSupportFile;
    public $newSupportObs;

    /** Listeners */
    protected $listeners = [
        'destroySupport' => 'destroySupport',
        'closeViaticRequest'
    ];

    public function mount(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }

    public function render()
    {
        return view('livewire.process-viatic-request.support-pago', [
            'supports' => SupportsViaticRequests::where('viatic_request_id', $this->viaticRequest->id)->get(),
            'id_type_support_pago' => ETypeSupportLegalization::SUPPORT_PAGO->getId()
        ]);
    }

    public function addSupport()
    {
        $this->validate([
            'newSupportFile' => 'required|max:1024',
            'newSupportObs' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $support = new SupportsViaticRequests();
            $support->viatic_request_id = $this->viaticRequest->id;
            $support->url = $this->newSupportFile->store("public/solicitud-anticipo/soportes/" . $this->viaticRequest->id);
            $support->observation = $this->newSupportObs;
            $support->created_by = auth()->user()->id;
            $support->type_support = ETypeSupportLegalization::SUPPORT_PAGO->getId();
            $support->save();

            $this->emit('responseUpload', true);
            $this->reset(['newSupportFile', 'newSupportObs']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseUpload', false);
        }
    }

    public function destroySupport(SupportsViaticRequests $object)
    {
        Storage::delete($object->url);
        $object->delete();
    }

    public function closeViaticRequest()
    {
        if (count($this->viaticRequest->supports()->get()) <= 0) {
            $this->addError('supportss', 'Hace Falta subir por lo menos un soporte.');
            return;
        }
        try {
            DB::beginTransaction();


            //Se cambia el estado
            $newState = EStateRequest::CLOSE->getId();
            $this->viaticRequest->sw_state = $newState;
            $this->viaticRequest->save();
            $this->viaticRequest->createNewTimeLine($newState);
            //se guarda la observacion
            if (!empty($this->observation)) {
                $obs = new ObservationViaticModel();
                $obs->message = $this->observation;
                $obs->create_by = auth()->user()->id;
                $obs->viatic_request_id = $this->viaticRequest->id;
                $obs->save();
            }

            /**CORREOS ELECTRONICOS */
            $this->viaticRequest->sendEmail("Se COMPLETO la solicitud de anticipo");
            /**____________________FIN CORREOS ELECTRONICOS_________________ */

            $this->emit('responseAprove', true, route('viatic.show', $this->viaticRequest->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseAprove', false, null);
        }
    }
}
