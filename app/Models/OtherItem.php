<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    //relacion muchos a muchos para viatic quest
    public function viaticRequests()
    {
        return $this->belongsToMany(ViaticRequest::class)->withTimestamps();
    }
}
