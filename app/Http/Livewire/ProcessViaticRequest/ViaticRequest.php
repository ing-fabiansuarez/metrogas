<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Mail\ViaticRequestMaileable;
use App\Models\DestinationSite;
use App\Models\OriginSite;
use App\Models\ViaticRequest as ModelsViaticRequest;
use App\Models\ViaticRequestsSitesDetalle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ViaticRequest extends Component
{
    public $listSite;

    /**ATRIBUTOS */
    public $justification;
    public $origin;
    public $destination;
    public $start_date;
    public $end_date;

    //escuchadores de eventos
    protected $listeners = [
        'removeSite' => 'removeSite',
        'createViaticRequest' => 'createViaticRequest',
    ];

    public function __construct()
    {
        $this->listSite = array();
    }


    public function render()
    {
        return view('livewire.process-viatic-request.viatic-request');
    }

    public function addSite()
    {
        $this->validate([
            'origin' => 'required',
            'destination' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $modelDestination = DestinationSite::find($this->destination);
        $modelOrigin = OriginSite::find($this->origin);
        array_push($this->listSite, [
            'id_origin_site' => $this->origin,
            'id_destination_site' =>  $this->destination,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'name_origin' => $modelOrigin->name,
            'name_destination' => $modelDestination->name
        ]);
        $this->reset([
            'origin',
            'destination',
            'start_date',
            'end_date'
        ]);
    }

    public function removeSite($indexArray)
    {
        unset($this->listSite[$indexArray]);
        $this->listSite;
    }

    public function createViaticRequest()
    {
        /** VALIDACIONES */
        //Justificacion
        $this->validate([
            'justification' => 'required',
        ]);
        //Comisines
        if (count($this->listSite) < 1) {
            $this->addError('comission', __('messages.validation.comission'));
            return;
        }

        /* try { */
        DB::beginTransaction();
        $viaticRequest = new ModelsViaticRequest();
        $viaticRequest->justification = $this->justification;
        $viaticRequest->request_by = auth()->user()->id;
        $viaticRequest->sw_state = EStateRequest::CREATED->getId();
        $viaticRequest->save();
        foreach ($this->listSite as $site) {
            $newDetalle = new ViaticRequestsSitesDetalle();
            $newDetalle->id_origin_site = $site['id_origin_site'];
            $newDetalle->id_destination_site = $site['id_destination_site'];
            $newDetalle->start_date = $site['start_date'];
            $newDetalle->end_date = $site['end_date'];
            $newDetalle->viatic_request_id = $viaticRequest->id;
            $newDetalle->save();
        }

        /**CORREOS ELECTRONICOS */
        //enviar el correo electronico de que se creo un viatico
        $correo = new ViaticRequestMaileable($viaticRequest);
        $correo->subject("Nueva solicitud de Anticipo - " . $viaticRequest->getNameState());
        $correosJefes = [];
        foreach ($viaticRequest->user->jobtitle->boss->users()->get() as $user) {
            array_push($correosJefes, $user->email_aux);
        }
        //array_push($correosJefes, 'sandra.hernandez@metrogassaesp.com');

        Mail::to($viaticRequest->user->email_aux)
            ->cc($correosJefes)
            ->queue($correo);
        /**____________________FIN CORREOS ELECTRONICOS_________________ */

        //mostrar el mensaje de que se creo correctamente
        $this->emit('requestSave', route('viatic.show', $viaticRequest->id));

        DB::commit();

        /*   } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        } */
    }
}
