<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViaticRequest extends Model
{
    use HasFactory;

    public function sites()
    {
        return $this->hasMany('App\Models\ViaticRequestsSitesDetalle', 'id', 'viatic_request_id');
    }
}
