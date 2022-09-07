<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\ObservationViaticModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pago extends Component
{
    public $viaticRequest;

    public $observation;

    public $obsCanceled;
    public $obsRechazar;

    /** Listeners */
    protected $listeners = [
        'aproveViaticRequest' => 'aproveViaticRequest',
        'canceledRequest',
        'rechazarRequest'
    ];

    public function render()
    {
        return view('livewire.process-viatic-request.pago');
    }
    public function aproveViaticRequest()
    {
        $this->validate([
            'observation' => 'required'
        ]);
        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->viaticRequest->sw_state = EStateRequest::PAGO_DIRECTOR->getId();
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

    public function canceledRequest()
    {
        //comprobar si esta autorizado para cancelar la autorizacion

        //validacion de que llegue la observacion
        $this->validate([
            'obsCanceled' => 'required'
        ]);

        DB::beginTransaction();
        //Se cambia el estado
        $newState =  EStateRequest::CANCELED->getId();
        $this->viaticRequest->sw_state = $newState;
        $this->viaticRequest->save();
        $this->viaticRequest->createNewTimeLine($newState);
        //Se guarda la observacion de la cancelación
        $obs = new ObservationViaticModel();
        $obs->message = "Se ANULÓ la solicitud por parte del encargado de Pagar porque... " . $this->obsCanceled;
        $obs->create_by = auth()->user()->id;
        $obs->viatic_request_id = $this->viaticRequest->id;
        $obs->save();
        //se envia el correo electronico de la notificacion
        $this->viaticRequest->sendEmail("Se ANULO la solicitud por parte del encargado de Pagar");
        $this->emit('responseCanceled', true, route('viatic.show', $this->viaticRequest->id));
        DB::commit();
    }

    public function rechazarRequest()
    {
        $this->validate([
            'obsRechazar' => 'required'
        ]);

        DB::beginTransaction();
        $newState =  EStateRequest::BY_CREATE->getId();
        //Se cambia el estado
        $this->viaticRequest->sw_state = $newState;
        $this->viaticRequest->save();

        //se agrega la linea de tiempo 
        $this->viaticRequest->createNewTimeLine($newState);
        //Se guarda la observacion de la cancelación
        $obs = new ObservationViaticModel();
        $obs->message = "Se RECHAZO la solicitud por parte del encargado de Pagar porque... " . $this->obsRechazar;
        $obs->create_by = auth()->user()->id;
        $obs->viatic_request_id = $this->viaticRequest->id;
        $obs->save();
        $this->viaticRequest->sendEmail("Se RECHAZO la solicitud por parte del encargado de Pagar");
        $this->emit('responseRechazado', true, route('viatic.show', $this->viaticRequest->id));
        DB::commit();
    }
}
