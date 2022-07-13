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
        'canceledLegalization'
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
            $correo = new LegalizationMailable($this->legalization);
            $correo->subject("Legalización N° " . $this->legalization->id . " esta COMPLETA. - " . $this->legalization->getNameState());
            $correosJefes = [];
            foreach ($this->legalization->user->jobtitle->boss->users()->get() as $user) {
                array_push($correosJefes, $user->email_aux);
            }
            array_push($correosJefes, 'sandra.hernandez@metrogassaesp.com');

            Mail::to($this->legalization->user->email_aux)
                ->cc($correosJefes)
                ->queue($correo);
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


            $this->emit('responseCanceled', true, route('legalization.show', $this->legalization->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseCanceled', false, null);
        }
    }
}
