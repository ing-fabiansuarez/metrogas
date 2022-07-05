<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\ObservationViaticModel;
use App\Models\OtherExpense;
use App\Models\ViaticRequest;
use Illuminate\Support\Facades\DB;
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


    /** Listeners */
    protected $listeners = [
        'addOtherExpenses' => 'addOtherExpenses',
        'aproveViaticRequest' => 'aproveViaticRequest'
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
        $this->viaticRequest->calculateAmounts();
        $this->calculateTotalGeneral();
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
        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->viaticRequest->sw_state = EStateRequest::APROVED->getId();
            $this->viaticRequest->save();
            //se guardan los detalles
            foreach ($this->viaticRequest->sites as $site) {
                $site->save();
            }
            //se guardan los otros gasto
            foreach ($this->listOtherExpenses as $other) {
                $this->viaticRequest->otherExpenses()->attach([
                    $other['tipo_otro_gasto'] => ['value' => $other['cantidad_otro_gasto']]
                ]);
            }
            //se guardan los otros items
            foreach ($this->gestion as $item) {
                $this->viaticRequest->otherItems()->attach([
                    $item
                ]);
            }
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
