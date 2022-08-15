<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Mail\ViaticRequestMaileable;
use App\Models\ObservationViaticModel;
use App\Models\OtherExpense;
use App\Models\ViaticRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AproveBoss extends Component
{
    public $viaticRequest;

    /** Otros Gasto */
    public $listOtherExpenses;
    public $tipo_otro_gasto;
    public $cantidad_otro_gasto;

    /** Otros Items */
    public $gestion = [];

    //observacion
    public $observation;

    //total de todo el anticipo
    public $totalAnticipo;

    public $obsCanceled;
    public $obsRechazar;


    /** Listeners */
    protected $listeners = [
        'addOtherExpenses' => 'addOtherExpenses',
        'aproveViaticRequest' => 'aproveViaticRequest',
        'canceledRequest',
        'rechazarRequest',
        'removeOtherExpense'
    ];

    /**Reglas */
    protected $rules = [
        'viaticRequest.sites.*.accommodation_value' => '',
        'viaticRequest.sites.*.feeding_value' => '',
        'viaticRequest.sites.*.intermunicipal_trans_value' => '',
        'viaticRequest.sites.*.municipal_trans_value' => '',
        'viaticRequest.sites.*.total_value' => ''
    ];

    public function mount(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
        $this->listOtherExpenses = array();
        // se calcula los motos vara los sitios a lo que se valla a ir
        //$this->viaticRequest->calculateAmounts();
       // $this->calculateTotalGeneral();
    }
    private function calculateTotalGeneral()
    { // con este metodo calculamos el total general del anticipo
        $this->totalAnticipo = 0;
        //totales de cada destino
        foreach ($this->viaticRequest->sites as $index => $site) {
            $this->totalAnticipo += $site->total_value;
        }
        //otros gastos
        foreach ($this->listOtherExpenses as $other) {
            $this->totalAnticipo += $other['cantidad_otro_gasto'];
        }
    }

    private function calculateTotalSites()
    { //con esta funcion calculamos los totales de acuerdo a lo que haya dijitado el ususario
        foreach ($this->viaticRequest->sites as $index => $site) {
            $site->total_value = ($site->accommodation_value != "" ? $site->accommodation_value : 0) +
                ($site->feeding_value != "" ? $site->feeding_value : 0) +
                ($site->intermunicipal_trans_value != "" ? $site->intermunicipal_trans_value : 0)
                + ($site->municipal_trans_value != "" ? $site->municipal_trans_value : 0);
        }
    }

    public function updated($name, $value)
    {
        $this->calculateTotalSites();
        $this->calculateTotalGeneral();
    }

    public function render()
    {
        return view('livewire.process-viatic-request.aprove-boss', [
            'other_expense' => OtherExpense::all()
        ]);
    }

    public function addOtherExpenses()
    {
        $this->validate([
            'tipo_otro_gasto' => 'required',
            'cantidad_otro_gasto' => 'required'
        ]);
        array_push($this->listOtherExpenses, [
            'tipo_otro_gasto' => $this->tipo_otro_gasto,
            'cantidad_otro_gasto' => $this->cantidad_otro_gasto,
            'name_otro_gasto' => OtherExpense::find($this->tipo_otro_gasto)->name
        ]);
        $this->reset([
            'tipo_otro_gasto',
            'cantidad_otro_gasto',
        ]);
        $this->calculateTotalGeneral();
    }

    public function aproveViaticRequest()
    {
        /* try { */
        DB::beginTransaction();
        //Se cambia el estado
        $newState =  EStateRequest::APROVED->getId();
        $this->viaticRequest->sw_state = $newState;
        $this->viaticRequest->save();
        $this->viaticRequest->createNewTimeLine($newState);
        //se guardan los detalles
        /* foreach ($this->viaticRequest->sites as $site) {
            $site->save();
        } */
        //se guardan los otros gasto
       /*  foreach ($this->listOtherExpenses as $other) {
            $this->viaticRequest->otherExpenses()->attach([
                $other['tipo_otro_gasto'] => ['value' => $other['cantidad_otro_gasto']]
            ]);
        } */
        //se guardan los otros items
        /* foreach ($this->gestion as $item) {
            $this->viaticRequest->otherItems()->attach([
                $item
            ]);
        } */
        //se guarda la observacion
        if (!empty($this->observation)) {
            $obs = new ObservationViaticModel();
            $obs->message = $this->observation;
            $obs->create_by = auth()->user()->id;
            $obs->viatic_request_id = $this->viaticRequest->id;
            $obs->save();
        }

        /**CORREOS ELECTRONICOS */
        //enviar el correo electronico de que se creo un viatico
        $this->viaticRequest->sendEmail("Se APROBO la solicitud por parte del jefe inmediato.");
        /**____________________FIN CORREOS ELECTRONICOS_________________ */

        $this->emit('responseAprove', true, route('viatic.show', $this->viaticRequest->id));
        DB::commit();
        /* } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseAprove', false, null);
        } */
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
        $newState = EStateRequest::CANCELED->getId();
        $this->viaticRequest->sw_state = $newState;
        $this->viaticRequest->save();
        $this->viaticRequest->createNewTimeLine($newState);
        //Se guarda la observacion de la cancelación
        $obs = new ObservationViaticModel();
        $obs->message = "Se ANULÓ por parte del jefe inmediato la solicitud porque... " . $this->obsCanceled;
        $obs->create_by = auth()->user()->id;
        $obs->viatic_request_id = $this->viaticRequest->id;
        $obs->save();

        /**CORREOS ELECTRONICOS */
        //enviar el correo electronico de que se creo un viatico
        $this->viaticRequest->sendEmail("Se ANULO la solicitud de anticipo");
        /**____________________FIN CORREOS ELECTRONICOS_________________ */

        $this->emit('responseCanceled', true, route('viatic.show', $this->viaticRequest->id));
        DB::commit();
    }

    public function rechazarRequest()
    {

        //validacion de que llegue la observacion
        $this->validate([
            'obsRechazar' => 'required'
        ]);

        DB::beginTransaction();

        $newState = EStateRequest::BY_CREATE->getId();

        //Se cambia el estado
        $this->viaticRequest->sw_state = $newState;
        $this->viaticRequest->save();
        //Se guarda la observacion de la cancelación
        $obs = new ObservationViaticModel();
        $obs->message = "Se RECHAZO por parte del jefe inmediato la solicitud porque... " . $this->obsRechazar;
        $obs->create_by = auth()->user()->id;
        $obs->viatic_request_id = $this->viaticRequest->id;
        $obs->save();
        //se crea el nuevo timeline
        $this->viaticRequest->createNewTimeLine($newState);

        /**CORREOS ELECTRONICOS */
        //enviar el correo electronico de que se creo un viatico
        $this->viaticRequest->sendEmail("Se RECHAZO por parte del jefe inmediato");
        /**____________________FIN CORREOS ELECTRONICOS_________________ */

        $this->emit('responseRezada', true, route('viatic.show', $this->viaticRequest->id));
        DB::commit();
    }

    public function removeOtherExpense($indexArray)
    {
        unset($this->listOtherExpenses[$indexArray]);
        $this->calculateTotalSites();
        $this->calculateTotalGeneral();
    }
}
