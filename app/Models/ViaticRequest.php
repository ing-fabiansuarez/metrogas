<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViaticRequest extends Model
{
    use HasFactory;

    public function sites()
    {
        return $this->hasMany(ViaticRequestsSitesDetalle::class, 'viatic_request_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'request_by', 'id');
    }
}
