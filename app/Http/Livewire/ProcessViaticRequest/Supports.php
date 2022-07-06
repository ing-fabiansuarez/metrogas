<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\ObservationViaticModel;
use App\Models\SupportsViaticRequests;
use App\Models\ViaticRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Supports extends Component
{
    use WithFileUploads;

    public ViaticRequest $viaticRequiest;

    public $observation;
    public $newSupportFile;
    public $newSupportObs;

    /** Listeners */
    protected $listeners = [
        'closeViaticRequest' => 'closeViaticRequest',
        'destroySupport' => 'destroySupport'
    ];

    public function mount(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }

    public function render()
    {
        return view('livewire.process-viatic-request.supports', [
            'supports' => SupportsViaticRequests::latest()
                ->where('viatic_request_id', $this->viaticRequest->id)->get()
        ]);
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
            $this->viaticRequest->sw_state = EStateRequest::CLOSE->getId();
            $this->viaticRequest->save();
            //se guarda la observacion
            if (!empty($this->observation)) {
                $obs = new ObservationViaticModel();
                $obs->message = $this->observation;
                $obs->create_by = auth()->user()->id;
                $obs->viatic_request_id = $this->viaticRequest->id;
                $obs->save();
            }

            $this->emit('responseAprove', true, route('viatic.show', $this->viaticRequest->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseAprove', false, null);
        }
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
            $support->url = $this->newSupportFile->store("public/solicitud-anticipo/soportes/" . $this->viaticRequest->id . "/");
            $support->observation = $this->newSupportObs;
            $support->created_by = auth()->user()->id;
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
}
