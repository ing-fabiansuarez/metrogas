<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Models\DestinationSite;
use App\Models\OriginSite;
use App\Models\ViaticRequest as ModelsViaticRequest;
use App\Models\ViaticRequestsSitesDetalle;
use Illuminate\Support\Facades\DB;
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
        'createViaticRequest' => 'createViaticRequest'
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
        $modelDestination = DestinationSite::find($this->origin);
        $modelOrigin = OriginSite::find($this->destination);
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

        try {
            DB::beginTransaction();
            $viaticRequest = new ModelsViaticRequest();
            $viaticRequest->justification = $this->justification;
            $viaticRequest->request_by = auth()->user()->id;
            $viaticRequest->save();
            $listModelSites = [];
            foreach ($this->listSite as $site) {
                $newDetalle = new ViaticRequestsSitesDetalle();
                $newDetalle->id_origin_site = 1;
                $newDetalle->id_destination_site = 1;
                $newDetalle->start_date = '2021-09-20';
                $newDetalle->end_date = '2021-09-20';
                $newDetalle->viatic_request_id = $viaticRequest->id;

                $newDetalle->save();

                array_push($listModelSites, $newDetalle);
            }
            //mostrar el mensaje de que se creo correctamente
            $this->emit('requestSave');

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        }
    }
}
