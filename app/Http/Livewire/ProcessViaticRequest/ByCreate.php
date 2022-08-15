<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Models\CentroDeCostos;
use App\Models\DestinationSite;
use App\Models\OriginSite;
use App\Models\OtherExpense;
use App\Models\ViaticRequestsSitesDetalle;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ByCreate extends Component
{
    public $viaticRequest;
    public $listSite;
    public $listTarifas;

    /**ATRIBUTOS */
    public $justification;
    public $origin;
    public $destination;
    public $start_date;
    public $end_date;
    public $centroDeCostos;
    public $numeroIdentificacion;


    /** Otros Gasto */
    public $listOtherExpenses;
    public $tipo_otro_gasto;
    public $cantidad_otro_gasto;

    //total de todo el anticipo
    public $totalAnticipo;
    /** Otros Items */
    public $gestion = [];

    //escuchadores de eventos
    protected $listeners = [
        'removeSite' => 'removeSite',
        'updateViaticRequest' => 'updateViaticRequest',
        'addOtherExpenses',
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
        $this->recalcularCifras();
    }

    public function recalcularCifras()
    {

        $this->totalAnticipo = 0;

        //calcula los totales de las tarifas
        foreach ($this->listTarifas as $index => $tarifa) {
            $alojamiento = is_numeric($tarifa['alojamiento']) ? $tarifa['alojamiento'] : 0;
            $alimentacion = is_numeric($tarifa['alimentacion']) ? $tarifa['alimentacion'] : 0;
            $trans_intermunicipal = is_numeric($tarifa['trans_intermunicipal']) ? $tarifa['trans_intermunicipal'] : 0;
            $trans_municipal = is_numeric($tarifa['trans_municipal']) ? $tarifa['trans_municipal'] : 0;
            //calculamos los Subtotatles de los detino

            $this->listTarifas[$index]['total'] = $alojamiento + $alimentacion + $trans_intermunicipal + $trans_municipal;
            $this->totalAnticipo += $alojamiento + $alimentacion + $trans_intermunicipal + $trans_municipal;
        }

        //total de otros gastos

        foreach ($this->listOtherExpenses as $otherExpense) {
            $this->totalAnticipo += $otherExpense['cantidad_otro_gasto'];
        }
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
        $this->recalcularCifras();
    }

    public function __construct()
    {
        $this->listSite = array();
        $this->listTarifas = array();
        $this->listOtherExpenses = array();
    }

    public function mount($viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
        $this->justification = $this->viaticRequest->justification;
        $this->centroDeCostos = $this->viaticRequest->centro_de_costos_id;
        $this->numeroIdentificacion = $this->viaticRequest->num_identification;

        foreach ($this->viaticRequest->sites as $site) {
            $modelDestination = DestinationSite::find($site->id_destination_site);
            $modelOrigin = OriginSite::find($site->id_origin_site);
            array_push($this->listSite, [
                'id_origin_site' => $site->id_origin_site,
                'id_destination_site' =>  $site->id_destination_site,
                'start_date' => $site->start_date,
                'end_date' => $site->end_date,
                'name_origin' => $modelOrigin->name,
                'name_destination' => $modelDestination->name
            ]);
            array_push($this->listTarifas, [
                'alojamiento' => $site->accommodation_value,
                'alimentacion' =>  $site->feeding_value,
                'trans_intermunicipal' => $site->intermunicipal_trans_value,
                'trans_municipal' => $site->municipal_trans_value,
                'total' =>  $site->total_value
            ]);
        }

        foreach ($this->viaticRequest->otherExpenses as $otherExpense) {
            array_push($this->listOtherExpenses, [
                'tipo_otro_gasto' => $otherExpense->pivot->other_expense_id,
                'name_otro_gasto' => $otherExpense->name,
                'cantidad_otro_gasto' => $otherExpense->pivot->value
            ]);
        }

        $this->recalcularCifras();
    }

    public function render()
    {
        return view('livewire.process-viatic-request.by-create', [
            'other_expense' => OtherExpense::all(),
            'centroDeCostosDB' => CentroDeCostos::all(),
        ]);
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

        array_push($this->listTarifas, [
            'alojamiento' => 0,
            'alimentacion' =>  0,
            'trans_intermunicipal' => 0,
            'trans_municipal' => 0,
            'total' => 0
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
        unset($this->listTarifas[$indexArray]);
        $this->listSite;
        $this->recalcularCifras();
    }

    public function updateViaticRequest()
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
        $newState = EStateRequest::CREATED->getId();

        $viaticRequest = $this->viaticRequest;
        $viaticRequest->createNewTimeLine($newState);
        $viaticRequest->justification = $this->justification;
        $viaticRequest->centro_de_costos_id = $this->centroDeCostos;
        $viaticRequest->num_identification = $this->numeroIdentificacion;
        $viaticRequest->request_by = auth()->user()->id;
        $viaticRequest->sw_state = $newState;
        $viaticRequest->save();

        //hay que eliminar los que ya existen
        $viaticRequest->sites()->delete();
        //se crean los nuevos sitios
        foreach ($this->listSite as $index => $site) {
            $newDetalle = new ViaticRequestsSitesDetalle();
            $newDetalle->id_origin_site = $site['id_origin_site'];
            $newDetalle->id_destination_site = $site['id_destination_site'];
            $newDetalle->start_date = $site['start_date'];
            $newDetalle->end_date = $site['end_date'];
            $newDetalle->viatic_request_id = $viaticRequest->id;

            //se guardan los valores de las tarifas
            $newDetalle->accommodation_value = $this->listTarifas[$index]['alojamiento'];
            $newDetalle->feeding_value = $this->listTarifas[$index]['alimentacion'];
            $newDetalle->intermunicipal_trans_value = $this->listTarifas[$index]['trans_intermunicipal'];
            $newDetalle->municipal_trans_value = $this->listTarifas[$index]['trans_municipal'];
            $newDetalle->total_value = $this->listTarifas[$index]['total'];


            $newDetalle->save();
        }

        //se guardan los otros gasto
        $viaticRequest->otherExpenses()->detach();
        foreach ($this->listOtherExpenses as $other) {
            $viaticRequest->otherExpenses()->attach([
                $other['tipo_otro_gasto'] => ['value' => $other['cantidad_otro_gasto']]
            ]);
        }

        //se guardan los otros items GESTION
        $viaticRequest->otherItems()->detach();
        foreach ($this->gestion as $item) {
            $viaticRequest->otherItems()->attach([
                $item
            ]);
        }

        /**CORREOS ELECTRONICOS */
        $viaticRequest->sendEmail("Paso a aprobación por parte del jefe inmediato");
        /**____________________FIN CORREOS ELECTRONICOS_________________ */

        //mostrar el mensaje de que se creo correctamente
        $this->emit('requestSave', route('viatic.show', $viaticRequest->id));

        DB::commit();

        /*   } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        } */
    }
    public function removeOtherExpense($indexArray)
    {
        unset($this->listOtherExpenses[$indexArray]);
        $this->recalcularCifras();
    }
}
