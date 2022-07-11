<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportsLegalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'observation',
        'created_by'
    ];

    public function legalization()
    {
        return $this->belongsTo(Legalization::class, 'legalization_id', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function typeIdentification()
    {
        return $this->belongsTo(TypeIdentification::class, 'type_identification', 'id');
    }
}
