<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportsViaticRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'observation',
        'created_by',
        'type_support'
    ];

    public function viaticRequest()
    {
        return $this->belongsTo(ViaticRequest::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
