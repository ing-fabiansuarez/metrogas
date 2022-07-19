<?php

namespace App\Models;

use App\Enums\EStateRequest;
use App\Mail\ViaticRequestMaileable;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ViaticRequest extends Model
{
    use HasFactory;

    public function sendEmail($subject)
    {
        $correo = new ViaticRequestMaileable($this);
        $correo->subject("Solicitud N° " . $this->id . " - " . $subject);
        $correosCopied = [];
        foreach ($this->user->jobtitle->boss->users()->get() as $user) {
            array_push($correosCopied, $user->email_aux);
        }
        //si esta en estado aprobado que envie un correo tambien a la que tiene el perfil de direccion financiera para que apruebe
        switch ($this->sw_state) {
            case EStateRequest::ACCEPTED_EMPLOYEE->getId():
                //COPIADO busca las personas que tienen el permiso de aprobar la solicitudes de anticipos para copiarlos al correo
                foreach (User::permission('aproveGeneral')->get() as $user) {
                    array_push($correosCopied, $user->email_aux);
                }
                break;
            case EStateRequest::APROVED_GENERAL->getId():
                //COPIADO busca las personas que tienen el permiso de aprobar la solicitudes de anticipos para copiarlos al correo
                foreach (User::permission('aproveGeneral')->get() as $user) {
                    array_push($correosCopied, $user->email_aux);
                }
                //COPIADO tesoreria
                foreach (User::permission('aproveTesoreria')->get() as $user) {
                    array_push($correosCopied, $user->email_aux);
                }
                break;
        }

        Mail::to($this->user->email_aux)
            ->cc($correosCopied)
            ->queue($correo);
    }

    public function  createNewTimeLine($newState)
    {
        $newTL = new TimeLineViaticRequest();
        $newTL->viatic_request_id = $this->id;
        $newTL->created_by = auth()->user()->id;
        $newTL->state_actual = $newState;
        $newTL->save();
    }

    public function timeLine()
    {
        return $this->hasMany(TimeLineViaticRequest::class, 'viatic_request_id', 'id');
    }

    public function supports()
    {
        return $this->hasMany(SupportsViaticRequests::class, 'viatic_request_id', 'id');
    }

    public function canAproveBoss()
    {
        //estamos validando si podemos aprobar una solicitud
        foreach ($this->bosses() as $user) {
            if ($user->id == auth()->user()->id) {
                return true;
            }
        }
        return false;
    }

    public function canAproveGeneral()
    {
        //aqui va la aprobacion por parte de la direccion financiera
        $user = User::find(auth()->user()->id);
        return  $user->can('aproveGeneral');
    }

    public function canUploadSupports()
    {
        $user = User::find(auth()->user()->id);
        return  $user->can('aproveTesoreria');
    }

    public function bosses()
    {
        return $this->user->jobtitle->boss->users()->get();
    }

    public function sites()
    {
        return $this->hasMany(ViaticRequestsSitesDetalle::class, 'viatic_request_id', 'id');
    }

    public function observations()
    {
        return $this->hasMany(ObservationViaticModel::class, 'viatic_request_id', 'id')->orderBy('created_at', 'asc');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'request_by', 'id');
    }

    //metodo de muchos a mucho para los "otros gastos"

    public function otherExpenses()
    {
        return $this->belongsToMany(OtherExpense::class, 'other_expense_viatic_request', 'viatic_request_id', 'other_expense_id')->withPivot('value')->withTimestamps();
    }

    //muchos a muchos otros items
    public function otherItems()
    {
        return $this->belongsToMany(OtherItem::class, 'other_item_viatic_request', 'viatic_request_id', 'other_item_id')->withTimestamps();
    }

    public function getNameState()
    {
        return EStateRequest::from($this->sw_state)->getName();
    }

    public function stateColor()
    {
        return EStateRequest::from($this->sw_state)->getColor();
    }

    //calcula el total con sitios y gatos adicionales y retorna el total de los viaticos
    public function getTotalViaticRequest()
    {
        //se calcula los gasto principales de cada sitio
        $total = 0;
        foreach ($this->sites as $site) {
            $total +=
                $site->accommodation_value +
                $site->feeding_value +
                $site->intermunicipal_trans_value +
                $site->municipal_trans_value;
        }
        //se calculan los otros gastos si pucieron
        foreach ($this->otherExpenses as $other) {
            $total +=
                $other->pivot->value;
        }
        return $total;
    }

    //este metodo solo se puede ejecutar cuando el viaticrequest no se halla creado, este es el metodo que calcula automaticamente los montos.
    public function calculateAmounts()
    {
        //en esta funcion vamos a calcular los motos para los viaticos

        foreach ($this->sites as $site) {

            $num_days = $site->calculateNumDays();
            $accomo_value = 0;
            $feed_value = 0;
            $intermuni_value = 0;
            $municip_value = 0;


            //verificamos a que cidudad va de acuerdo al id de destino
            switch ($site->destinationSite->id) {
                    //Floridablanca
                case 1:
                    //NIVELES
                    switch ($this->user->jobtitle->level) {
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
                    switch ($this->user->jobtitle->level) {
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
                    switch ($this->user->jobtitle->level) {
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
                    switch ($this->user->jobtitle->level) {
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
                    switch ($this->user->jobtitle->level) {
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
                    switch ($this->user->jobtitle->level) {
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
                    switch ($this->user->jobtitle->level) {
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
                    switch ($this->user->jobtitle->level) {
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
                    switch ($this->user->jobtitle->level) {
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

            //se establecen los montos
            $site->accommodation_value = $accomo_value;
            $site->feeding_value = $feed_value * $num_days;
            $site->intermunicipal_trans_value = $intermuni_value;
            $site->municipal_trans_value = $municip_value;
            //total sitio
            $site->total_value =
                $site->accommodation_value +
                $site->feeding_value +
                $site->intermunicipal_trans_value +
                $site->municipal_trans_value;
        }
    }
}
