<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Mail\ViaticRequestMaileable;
use App\Models\ObservationViaticModel;
use App\Models\SupportsViaticRequests;
use App\Models\ViaticRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Supports extends Component
{
    use WithFileUploads;

    public ViaticRequest $viaticRequiest;

    public $observation;
    public $newSupportFile;
    public $newSupportObs;

    public $obsCanceled;
    public $obsRechazar;

    /** Listeners */
    protected $listeners = [
        'closeViaticRequest' => 'closeViaticRequest',
        'destroySupport' => 'destroySupport',
        'canceledRequest',
        'rechazarRequest'
    ];

    public function mount(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }

    public function render()
    {
        return view('livewire.process-viatic-request.supports', [
            'supports' => SupportsViaticRequests::latest()
                ->where('viatic_request_id', $this->viaticRequest->id)->get()
        ]);
    }

    public function closeViaticRequest()
    {
        if (count($this->viaticRequest->supports()->get()) <= 0) {
            $this->addError('supportss', 'Hace Falta subir por lo menos un soporte.');
            return;
        }
        try {
            DB::beginTransaction();


            //Se cambia el estado
            $this->viaticRequest->sw_state = EStateRequest::CLOSE->getId();
            $this->viaticRequest->save();
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
            $correo = new ViaticRequestMaileable($this->viaticRequest);
            $correo->subject("Solicitud de Anticipo N° " . $this->viaticRequest->id . " fue COMPLETADA. - " . $this->viaticRequest->getNameState());
            $correosJefes = [];
            foreach ($this->viaticRequest->user->jobtitle->boss->users()->get() as $user) {
                array_push($correosJefes, $user->email_aux);
            }
            array_push($correosJefes, 'sandra.hernandez@metrogassaesp.com');
            //array_push($correosJefes, 'hugo.bonilla@metrogassaesp.com');

            Mail::to($this->viaticRequest->user->email_aux)
                ->cc($correosJefes)
                ->queue($correo);
            /**____________________FIN CORREOS ELECTRONICOS_________________ */

            $this->emit('responseAprove', true, route('viatic.show', $this->viaticRequest->id));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseAprove', false, null);
        }
    }

    public function addSupport()
    {
        $this->validate([
            'newSupportFile' => 'required|max:1024',
            'newSupportObs' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $support = new SupportsViaticRequests();
            $support->viatic_request_id = $this->viaticRequest->id;
            $support->url = $this->newSupportFile->store("public/solicitud-anticipo/soportes/" . $this->viaticRequest->id . "/");
            $support->observation = $this->newSupportObs;
            $support->created_by = auth()->user()->id;
            $support->save();

            $this->emit('responseUpload', true);
            $this->reset(['newSupportFile', 'newSupportObs']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('responseUpload', false);
        }
    }

    public function destroySupport(SupportsViaticRequests $object)
    {
        Storage::delete($object->url);
        $object->delete();
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
        $this->viaticRequest->sw_state = EStateRequest::CANCELED->getId();
        $this->viaticRequest->save();
        //Se guarda la observacion de la cancelación
        $obs = new ObservationViaticModel();
        $obs->message = "Se ANULÓ la solicitud porque... " . $this->obsCanceled;
        $obs->create_by = auth()->user()->id;
        $obs->viatic_request_id = $this->viaticRequest->id;
        $obs->save();
        $this->emit('responseCanceled', true, route('viatic.show', $this->viaticRequest->id));
        DB::commit();
    }

    public function rechazarRequest()
    {
        $this->validate([
            'obsRechazar' => 'required'
        ]);

        DB::beginTransaction();
        $newState =  EStateRequest::CREATED->getId();
        //Se cambia el estado
        $this->viaticRequest->sw_state = $newState;
        $this->viaticRequest->save();

        //se agrega la linea de tiempo 
        $this->viaticRequest->createNewTimeLine($newState);
        //Se guarda la observacion de la cancelación
        $obs = new ObservationViaticModel();
        $obs->message = "Se RECHAZO la solicitud porque... " . $this->obsRechazar;
        $obs->create_by = auth()->user()->id;
        $obs->viatic_request_id = $this->viaticRequest->id;
        $obs->save();
        $this->emit('responseRechazado', true, route('viatic.show', $this->viaticRequest->id));
        DB::commit();
    }
}
