<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Models\OtherExpense;
use App\Models\ViaticRequest;
use Livewire\Component;

class AproveBoss extends Component
{
    public $viaticRequest;

    /** Otros Gasto */
    public $listOtherExpenses;
    public $tipo_otro_gasto;
    public $cantidad_otro_gasto;


    /** Listeners */
    protected $listeners = [
        'addOtherExpenses' => 'addOtherExpenses',
        'saveAprove' => 'saveAprove'
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
    }

    public function updated($name, $value)
    {
        foreach ($this->viaticRequest->sites as $index => $site) {
            $site->total_value = ($site->accommodation_value != "" ? $site->accommodation_value : 0) +
                ($site->feeding_value != "" ? $site->feeding_value : 0) +
                ($site->intermunicipal_trans_value != "" ? $site->intermunicipal_trans_value : 0)
                + ($site->municipal_trans_value != "" ? $site->municipal_trans_value : 0);
        }
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
    }

    public function saveAprove()
    {
        $this->alojamientoArray;
        $this->alojamientoArray;
    }
}
