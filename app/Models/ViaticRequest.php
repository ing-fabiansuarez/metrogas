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
            if ($user->jobtitle->name != 'N/D (No Definido)') {
                if ($user->email_aux != null) {
                    array_push($correosCopied, $user->email_aux);
                }
            }
        }

        switch ($this->sw_state) {
            case EStateRequest::ACCEPTED_EMPLOYEE->getId():
                //aqui es donde se envia correo para la aprobacion general
                if ($this->getTotalViaticRequest() >= 1000000) {
                    $userss = User::permission('aproveGeneralDirector')->get();
                } else {
                    $userss = User::permission('aproveGeneralJefe')->get();
                }

                foreach ($userss as $user) {
                    if ($user->email_aux != null) {
                        array_push($correosCopied, $user->email_aux);
                    }
                }
                break;
            case EStateRequest::APROVED_GENERAL->getId():
                // AQUI ES DONDE SE ENVIAR CORREO ENTRE APROBACION FINANCIERA Y SOPORTES TESORERIA
                // ENVIA A AUXILIAR TESORERIA
                // SECRETARIA DE GENERENCIA PARA QUE HAGA LA GESTION
                foreach (User::permission('uploadSupportsTesoreria')->get() as $user) {
                    if ($user->email_aux != null) {
                        array_push($correosCopied, $user->email_aux);
                    }
                }
                foreach (User::permission('correo.secretaria_gerencia')->get() as $user) {
                    if ($user->email_aux != null) {
                        array_push($correosCopied, $user->email_aux);
                    }
                }
                break;
            case EStateRequest::UPLOADED_SUPPORTS_TESORERIA->getId():
                // AQUI ES DONDE SE ENVIAR CORREO ENTRE SOPORTES TESORERIA Y APROBACION TESORERIA
                // SE ENVIA CORREO AL TESORERO
                foreach (User::permission('aproveTesoreria')->get() as $user) {
                    if ($user->email_aux != null) {
                        array_push($correosCopied, $user->email_aux);
                    }
                }
                break;
            case EStateRequest::APROVED_TESORERIA->getId():
                // AQUI ES DONDE SE ENVIAR CORREO ENTRE APROBACION TESORERIA Y PAGO
                // SE ENVIA A LA PERSONA QUE TIENE PERMISO DE PAGAR, EN ESTE CASO ROL DIRECTOR FINANCIERO
                foreach (User::permission('pagarViaticRequest')->get() as $user) {
                    if ($user->email_aux != null) {
                        array_push($correosCopied, $user->email_aux);
                    }
                }
                break;
            case EStateRequest::CLOSE->getId():
                // AQUI ES DONDE SE ENVIAR CORREO ENTRE APROBACION pagar y final
                // SE ENVIA A LA PERSONA QUE TIENE PERMISO de que llegue el correo de pago
                foreach (User::permission('emailSend')->get() as $user) {
                    if ($user->email_aux != null) {
                        array_push($correosCopied, $user->email_aux);
                    }
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

    public function usersCanAproveGeneral()
    {
        $usertotal = [];
        if ($this->getTotalViaticRequest() >= 1000000) {
            $userss = User::permission('aproveGeneralDirector')->get();
        } else {
            $userss = User::permission('aproveGeneralJefe')->get();
        }

        foreach ($userss as $user) {
            array_push($usertotal, $user);
        }
        return $usertotal;
    }

    public function canAproveGeneral()
    {
        //Aqui se define si es mayor a un salario minimo tiene que aprobarlo el director financiero sino la jefe financiera
        $user = User::find(auth()->user()->id);
        if ($this->getTotalViaticRequest() >= 1000000) {
            return $user->can('aproveGeneralDirector');
        } else {
            return $user->can('aproveGeneralJefe');
        }
    }

    public function usersCanPagar()
    {
        $users = [];
        foreach (User::permission('pagarViaticRequest')->get() as $user) {

            array_push($users, $user);
        }
        return $users;
    }
    public function canPagar()
    {
        $user = User::find(auth()->user()->id);
        return  $user->can('pagarViaticRequest');
    }

    public function usersCanAproveTesoreria()
    {
        $users = [];
        foreach (User::permission('aproveTesoreria')->get() as $user) {

            array_push($users, $user);
        }
        return $users;
    }
    public function canAproveTesoreria()
    {
        $user = User::find(auth()->user()->id);
        return  $user->can('aproveTesoreria');
    }

    public function usersCanUploadSupports()
    {
        $users = [];
        foreach (User::permission('uploadSupportsTesoreria')->get() as $user) {

            array_push($users, $user);
        }
        return $users;
    }
    public function canUploadSupports()
    {
        $user = User::find(auth()->user()->id);
        return  $user->can('uploadSupportsTesoreria');
    }

    public function bosses()
    {
        $bosses = [];
        foreach ($this->user->jobtitle->boss->users()->get() as $user) {
            if ($user->jobtitle->name != 'N/D (No Definido)') {
                array_push($bosses, $user);
            }
        }
        return $bosses;
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

    public function centroDeCostos()
    {
        return $this->belongsTo(CentroDeCostos::class, 'centro_de_costos_id', 'id');
    }

    //metodo de muchos a mucho para los "otros gastos"

    public function otherExpenses()
    {
        return $this->belongsToMany(OtherExpense::class, 'other_expense_viatic_request', 'viatic_request_id', 'other_expense_id')->withPivot('value', 'other_expense_id')->withTimestamps();
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
