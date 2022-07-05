<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservationViaticModel extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'create_by'];

    public function viaticRequest()
    {
        return $this->belongsTo(ViaticRequest::class);
    }

    public function createBy()
    {
        return $this->belongsTo(User::class, 'create_by', 'id');
    }
}
