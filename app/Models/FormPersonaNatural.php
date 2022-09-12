<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPersonaNatural extends Model
{
    use HasFactory;


    public function personasPoliticamenteExpuestas()
    {
        return $this->hasMany(FormPersonasExpuestasPoliticamentePN::class, 'form_persona_natural_id', 'id');
    }
}
