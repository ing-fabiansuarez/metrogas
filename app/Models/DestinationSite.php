<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationSite extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
}
