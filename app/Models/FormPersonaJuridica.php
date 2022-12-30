<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPersonaJuridica extends Model
{
    use HasFactory;

    public function personasPoliticamenteExpuestas()
    {
        return $this->hasMany(FormPersonasExpuestasPoliticamentePJ::class, 'form_persona_juridica_id', 'id');
    }

    public function beneficiariosFinales()
    {
        return $this->hasMany(FormBeneficiariosFinalesPJ::class, 'form_persona_juridica_id', 'id');
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
}
