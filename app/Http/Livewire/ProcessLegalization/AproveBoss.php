<?php

namespace App\Http\Livewire\ProcessLegalization;

use App\Enums\EStateLegalization;
use App\Enums\EStateRequest;
use App\Models\ObservationLegalization;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AproveBoss extends Component
{
    public $legalization;

    public $observation;

    /** Listeners */
    protected $listeners = [
        'aproveLegalization',
        'canceledLegalization',
        'rechazarLegalization'
    ];


    public function mount($legalization)
    {
        $this->legalization = $legalization;
    }

    public function render()
    {
        return view('livewire.process-legalization.aprove-boss');
    }

    public function aproveLegalization()
    {
        $this->validate([
            'observation' => 'required'
        ]);
        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->legalization->sw_state = EStateLegalization::APROVE_BOSS->getId();
            $this->legalization->save();

            $obs = new ObservationLegalization();
            $obs->message = $this->observation;
            $obs->created_by = auth()->user()->id;
            $obs->legalization_id = $this->legalization->id;
            $obs->save();
            $this->legalization->sendEmail("Esta pendiente aprobación Dirección Financiera");
            $this->emit('responseAprove', true, route('legalization.show', $this->legalization->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseAprove', false, null);
        }
    }

    public function canceledLegalization()
    {
        $this->validate([
            'observation' => 'required'
        ]);

        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->legalization->sw_state = EStateLegalization::CANCELED->getId();
            $this->legalization->save();
            //se guarda la observacion

            $obs = new ObservationLegalization();
            $obs->message = 'Se ANULO porque... ' . $this->observation;
            $obs->created_by = auth()->user()->id;
            $obs->legalization_id = $this->legalization->id;
            $obs->save();

            $this->legalization->sendEmail("Fue Anulada por parte del Jefe Inmediato");
            $this->emit('responseCanceled', true, route('legalization.show', $this->legalization->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseCanceled', false, null);
        }
    }

    public function rechazarLegalization()
    {
        $this->validate([
            'observation' => 'required'
        ]);

        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->legalization->sw_state = EStateLegalization::CREATED->getId();
            $this->legalization->save();
            //se guarda la observacion

            $obs = new ObservationLegalization();
            $obs->message = 'Se Rechazó por parte del jefe inmediato porque... ' . $this->observation;
            $obs->created_by = auth()->user()->id;
            $obs->legalization_id = $this->legalization->id;
            $obs->save();

            $this->legalization->sendEmail("Fue Rechazada la Legalización por parte del Jefe Inmediato");
            $this->emit('responseRechazar', true, route('legalization.show', $this->legalization->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseRechazar', false, null);
        }
    }
}
