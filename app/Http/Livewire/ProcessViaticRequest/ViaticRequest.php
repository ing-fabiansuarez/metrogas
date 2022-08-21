<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Enums\EStateRequest;
use App\Mail\ViaticRequestMaileable;
use App\Models\CentroDeCostos;
use App\Models\DestinationSite;
use App\Models\OriginSite;
use App\Models\OtherExpense;
use App\Models\OtherItem;
use App\Models\User;
use App\Models\ViaticRequest as ModelsViaticRequest;
use App\Models\ViaticRequestsSitesDetalle;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ViaticRequest extends Component
{
    public $listSite;
    public $listTarifas = [];

    /**ATRIBUTOS */
    public $justification;
    public $origin;
    public $destination;
    public $start_date;
    public $end_date;
    public $centroDeCostos;
    public $numeroIdentificacion;

    /** Otros Items */
    public $gestion = [];
    public $nameGestion = [];

    /** Otros Gasto */
    public $listOtherExpenses;
    public $tipo_otro_gasto;
    public $cantidad_otro_gasto;


    //total de todo el anticipo
    public $totalAnticipo;

    //escuchadores de eventos
    protected $listeners = [
        'removeSite' => 'removeSite',
        'createViaticRequest' => 'createViaticRequest',
        'addOtherExpenses',
        'removeOtherExpense'
    ];


    public function updated($name, $value)
    {
        $this->recalcularCifras();

        $this->nameGestion = [];
        foreach ($this->gestion as $idItem) {
            array_push($this->nameGestion, OtherItem::find($idItem)->name);
        }
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

    public function __construct()
    {
        $this->listSite = array();
        $this->listTarifas = array();
        $this->listOtherExpenses = array();
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
        $this->recalcularCifras();
    }

    public function render()
    {
        return view('livewire.process-viatic-request.viatic-request', [
            'centroDeCostosDB' => CentroDeCostos::all(),
            'other_expense' => OtherExpense::all(),
            'items' => OtherItem::all()
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
        //validar las fechas
        foreach ($this->listSite as $sitee) {
            if (
                $sitee['start_date'] <= $this->start_date &&
                $sitee['end_date'] >= $this->start_date
            ) {
                $this->addError('comission', 'Fecha inicio es invalida.');
                return;
            }
            if (
                $sitee['start_date'] <= $this->end_date &&
                $sitee['end_date'] >= $this->end_date
            ) {
                $this->addError('comission', 'Fecha Regreso es invalida.');
                return;
            }
        }
        if ($this->end_date < $this->start_date) {
            $this->addError('comission', 'La Fecha Inicio debe ser menor que la Fecha Final.');
            return;
        }
        //___________________________________

        $modelDestination = DestinationSite::find($this->destination);
        $modelOrigin = OriginSite::find($this->origin);
        //aqui añade los lugares  en un array
        array_push($this->listSite, [
            'id_origin_site' => $this->origin,
            'id_destination_site' =>  $this->destination,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'name_origin' => $modelOrigin->name,
            'name_destination' => $modelDestination->name
        ]);

        //aqui calcula los valores de tarifias segun el sitio que se agrego
        $this->calculateAmounts();
        $this->recalcularCifras();

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

    public function createViaticRequest()
    {
        /** VALIDACIONES */
        //Justificacion
        $this->validate([
            'justification' => 'required',
            'centroDeCostos' => 'required',
            'numeroIdentificacion' => 'required',
        ]);
        //Comisines
        if (count($this->listSite) < 1) {
            $this->addError('comission', __('messages.validation.comission'));
            return;
        }

        /* try { */
        DB::beginTransaction();

        //se crea los viaticos
        $viaticRequest = new ModelsViaticRequest();
        $viaticRequest->justification = $this->justification;
        $viaticRequest->request_by = auth()->user()->id;
        $viaticRequest->sw_state = EStateRequest::CREATED->getId();
        $viaticRequest->centro_de_costos_id = $this->centroDeCostos;
        $viaticRequest->num_identification = $this->numeroIdentificacion;
        $viaticRequest->save();

        //se crea la lista de sitios y los valores de las tarifas
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
        foreach ($this->listOtherExpenses as $other) {
            $viaticRequest->otherExpenses()->attach([
                $other['tipo_otro_gasto'] => ['value' => $other['cantidad_otro_gasto']]
            ]);
        }

        //se guardan los otros items GESTION
        foreach ($this->gestion as $item) {
            $viaticRequest->otherItems()->attach([
                $item
            ]);
        }

        /**CORREOS ELECTRONICOS */
        //enviar el correo electronico de que se creo un viatico
        $viaticRequest->sendEmail("Se creo una nueva solicitud de Anticipo, pediente aprobación");
        /**____________________FIN CORREOS ELECTRONICOS_________________ */

        //mostrar el mensaje de que se creo correctamente
        $this->emit('requestSave', route('viatic.show', $viaticRequest->id));

        DB::commit();

        /*   } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error']);
        } */
    }



    public function calculateAmounts()
    {


        //se trae el ultimo sition agregado
        $ultimoSitio = end($this->listSite);

        //calcular el numero de dias
        $fecha1 = new DateTime($ultimoSitio['start_date']);
        $fecha2 = new DateTime($ultimoSitio['end_date']);
        $diff = $fecha1->diff($fecha2);
        $num_days =  $diff->days + 1;


        $accomo_value = 0;
        $feed_value = 0;
        $intermuni_value = 0;
        $municip_value = 0;

        $user = User::find(auth()->user()->id);

        //verificamos a que cidudad va de acuerdo al id de destino
        switch ($ultimoSitio['id_destination_site']) {
                //Floridablanca
            case 1:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 50000;
                        break;
                    case 2:
                        $feed_value = 45000;
                        break;
                    case 3:
                        $feed_value = 40000;
                        break;
                }

                break;
                //Bucaramanga
            case 2:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 50000;
                        break;
                    case 2:
                        $feed_value = 45000;
                        break;
                    case 3:
                        $feed_value = 40000;
                        break;
                }
                break;
                //Bogotá
            case 3:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 50000;
                        break;
                    case 2:
                        $feed_value = 45000;
                        break;
                    case 3:
                        $feed_value = 40000;
                        break;
                }
                break;
                //Cartagena
            case 4:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 50000;
                        break;
                    case 2:
                        $feed_value = 45000;
                        break;
                    case 3:
                        $feed_value = 40000;
                        break;
                }
                break;
                //Barranquilla
            case 5:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 50000;
                        break;
                    case 2:
                        $feed_value = 45000;
                        break;
                    case 3:
                        $feed_value = 40000;
                        break;
                }
                break;
                //Medellin
            case 6:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 50000;
                        break;
                    case 2:
                        $feed_value = 45000;
                        break;
                    case 3:
                        $feed_value = 40000;
                        break;
                }
                break;
                // Ocaña
            case 7:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 40000;
                        $intermuni_value = 130000;
                        break;
                    case 2:
                        $feed_value = 35000;
                        $intermuni_value = 130000;
                        break;
                    case 3:
                        $feed_value = 30000;
                        $intermuni_value = 130000;
                        break;
                }
                break;
                //Rio de Oro
            case 8:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 40000;
                        $intermuni_value = 70000;
                        break;
                    case 2:
                        $feed_value = 35000;
                        $intermuni_value = 70000;
                        break;
                    case 3:
                        $feed_value = 30000;
                        $intermuni_value = 70000;
                        break;
                }
                break;
                //San Gil
            case 9:
                //NIVELES
                switch ($user->jobtitle->level) {
                    case 1:
                        $feed_value = 40000;
                        $intermuni_value = 46000;
                        break;
                    case 2:
                        $feed_value = 35000;
                        $intermuni_value = 46000;
                        break;
                    case 3:
                        $feed_value = 30000;
                        $intermuni_value = 46000;
                        break;
                }
                break;
        }

        array_push($this->listTarifas, [
            'alojamiento' => $accomo_value,
            'alimentacion' =>  $feed_value * $num_days,
            'trans_intermunicipal' => $intermuni_value,
            'trans_municipal' => $municip_value,
            'total' =>  $accomo_value + ($feed_value * $num_days) + $intermuni_value + $municip_value
        ]);
    }

    public function removeOtherExpense($indexArray)
    {
        unset($this->listOtherExpenses[$indexArray]);
        $this->recalcularCifras();
    }
}
