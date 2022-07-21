<?php

namespace App\Http\Livewire\ProcessLegalization;

use App\Enums\EStateLegalization;
use App\Mail\LegalizationMailable;
use App\Models\ObservationLegalization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AproveGeneral extends Component
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
        return view('livewire.process-legalization.aprove-general');
    }

    public function aproveLegalization()
    {
        $this->validate([
            'observation' => 'required'
        ]);
        try {
            DB::beginTransaction();
            //Se cambia el estado
            $this->legalization->sw_state = EStateLegalization::APROVE_GENERAL->getId();
            $this->legalization->save();

            $obs = new ObservationLegalization();
            $obs->message = $this->observation;
            $obs->created_by = auth()->user()->id;
            $obs->legalization_id = $this->legalization->id;
            $obs->save();

            /**CORREOS ELECTRONICOS */
            //enviar el correo electronico de que se creo un viatico
            $this->legalization->sendEmail("La Legalización esta completa, muchas gracias!");
            /**____________________FIN CORREOS ELECTRONICOS_________________ */


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
            $this->legalization->sendEmail("Se ANULO la legalización por parte de dirección financiera.");

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
            $obs->message = 'Se Rechazó por parte de la Dirección Financiera porque... ' . $this->observation;
            $obs->created_by = auth()->user()->id;
            $obs->legalization_id = $this->legalization->id;
            $obs->save();

            $this->legalization->sendEmail("Fue Rechazada la Legalización por parte de la Dirección Financiera");
            $this->emit('responseRechazar', true, route('legalization.show', $this->legalization->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseRechazar', false, null);
        }
    }
}
