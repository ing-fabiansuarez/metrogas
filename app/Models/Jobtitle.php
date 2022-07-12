<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id_boss'];

    public function subordinates()
    {
        return $this->hasMany(Jobtitle::class,  'id_boss', 'id');
    }

    public function boss()
    {
        return $this->belongsTo(Jobtitle::class, 'id_boss', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_jobtitle', 'id');
    }
}
