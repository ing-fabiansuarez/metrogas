<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\ObservationViaticModel;
use App\Models\ViaticRequest;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AproveGeneral extends Component
{
    public $viaticRequest;

    public $observation;

    /** Listeners */
    protected $listeners = [
        'aproveViaticRequest' => 'aproveViaticRequest'
    ];

    public function mount(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }

    public function render()
    {
        return view('livewire.process-viatic-request.aprove-general');
    }

    public function aproveViaticRequest()
    {
        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->viaticRequest->sw_state = EStateRequest::APROVED_GENERAL->getId();
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
}
