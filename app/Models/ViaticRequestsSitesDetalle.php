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

    public function viaticRequest()
    {
        return $this->belongsTo(ViaticRequest::class);
    }

    public function originSite()
    {
        return $this->belongsTo(OriginSite::class,'id_origin_site','id',);
    }
    public function destinationSite()
    {
        return $this->belongsTo(DestinationSite::class,'id_destination_site','id');
    }
}
