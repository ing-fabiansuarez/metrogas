<?php

namespace App\Models;

use App\Enums\EStateLegalization;
use App\Mail\LegalizationMailable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Legalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'justification',
        'viatic_request_id',
        'created_by',
        'sw_state'
    ];

    public function sendEmail($subject)
    {
        $correo = new LegalizationMailable($this);
        $correo->subject("Legalización N° " . $this->id . " - " . $subject);
        $correosCopied = [];
        foreach ($this->user->jobtitle->boss->users()->get() as $user) {
            if ($user->jobtitle->name != 'N/D (No Definido)') {
                if ($user->email_aux != null) {
                    array_push($correosCopied, $user->email_aux);
                }
            }
        }
        switch ($this->sw_state) {
            case EStateLegalization::APROVE_GENERAL->getId():
                //COPIADO busca las personas que tienen el permiso de aprobar la solicitudes de anticipos para copiarlos al correo
                foreach (User::permission('aproveGeneral')->get() as $user) {
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

    public function canContabilidad()
    {
        //determina quien de contabilidad tiene el permiso de aprobar las legalizaciones
        $user = User::find(auth()->user()->id);
        return  $user->can('aproveContabilidad');
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

    public function getNameState()
    {
        return EStateLegalization::from($this->sw_state)->getName();
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function observations()
    {
        return $this->hasMany(ObservationLegalization::class, 'legalization_id', 'id');
    }

    public function viaticRequest()
    {
        return $this->belongsTo(ViaticRequest::class, 'viatic_request_id', 'id');
    }
    public function supports()
    {
        return $this->hasMany(SupportsLegalization::class, 'legalization_id', 'id');
    }

    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->supports()->get() as $support) {
            $total += $support->total_factura;
        }
        return $total;
    }

    public function stateText()
    {
        return  EStateLegalization::from($this->sw_state)->getName();
    }
    public function stateColor()
    {
        return  EStateLegalization::from($this->sw_state)->getColor();
    }
}
