<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViaticRequestsSitesDetalle extends Model
{
    use HasFactory;
    protected $table = 'viatic_requests_sites_detalle';
    protected $primaryKey = 'id';

    protected $fillable = [
        'start_date',
        'end_date',
        'id_origin_site',
        'id_destination_site',
    ];
}
