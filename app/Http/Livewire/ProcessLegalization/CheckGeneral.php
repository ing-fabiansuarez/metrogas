<?php

namespace App\Http\Livewire\ProcessLegalization;

use App\Enums\EStateLegalization;
use App\Models\ObservationLegalization;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckGeneral extends Component
{
    public $legalization;

    public $observation;

    /** Listeners */
    protected $listeners = [
        'aproveLegalization',
        'rechazarLegalization'
    ];

    public function render()
    {
        return view('livewire.process-legalization.check-general');
    }

    public function aproveLegalization()
    {
        $this->validate([
            'observation' => 'required'
        ]);
        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->legalization->sw_state = EStateLegalization::CHECKED->getId();
            $this->legalization->save();

            $obs = new ObservationLegalization();
            $obs->message = $this->observation;
            $obs->created_by = auth()->user()->id;
            $obs->legalization_id = $this->legalization->id;
            $obs->save();
            // $this->legalization->sendEmail("Ya pendiente aprobación Dirección Financiera");
            $this->emit('responseAprove', true, route('legalization.show', $this->legalization->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseAprove', false, null);
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
            $obs->message = 'Se Rechazó en la verificación de la legalización porque... ' . $this->observation;
            $obs->created_by = auth()->user()->id;
            $obs->legalization_id = $this->legalization->id;
            $obs->save();

            $this->legalization->sendEmail("Fue Rechazada la Legalización en la Verificación por parte de " . auth()->user()->name);
            $this->emit('responseRechazar', true, route('legalization.show', $this->legalization->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseRechazar', false, null);
        }
    }
}
