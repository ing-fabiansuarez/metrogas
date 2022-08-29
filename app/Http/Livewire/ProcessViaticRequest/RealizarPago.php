<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\ObservationViaticModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RealizarPago extends Component
{
    public $viaticRequest;

    public $observation;

    public $obsCanceled;
    public $obsRechazar;

    /** Listeners */
    protected $listeners = [
        'aproveViaticRequest' => 'aproveViaticRequest',
    ];


    public function render()
    {
        return view('livewire.process-viatic-request.realizar-pago');
    }

    public function aproveViaticRequest()
    {
        $this->validate([
            'observation' => 'required'
        ]);
        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->viaticRequest->sw_state = EStateRequest::PAGO_REALIZADO->getId();
            $this->viaticRequest->save();
            //se guarda la observacion
            if (!empty($this->observation)) {
                $obs = new ObservationViaticModel();
                $obs->message = $this->observation;
                $obs->create_by = auth()->user()->id;
                $obs->viatic_request_id = $this->viaticRequest->id;
                $obs->save();
            }

            //SE ENVIA UN CORREO ELECTRONICO
            $this->viaticRequest->sendEmail("Solicitud de viatico, lista para realizar el pago.");
            $this->emit('responseAprove', true, route('viatic.show', $this->viaticRequest->id));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseAprove', false, null);
        }
    }
}
