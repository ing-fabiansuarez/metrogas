<?php

namespace App\Models;

use App\Enums\EStateLegalization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'justification',
        'viatic_request_id',
        'created_by',
        'sw_state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function observations()
    {
        return $this->hasMany(ObservationLegalization::class, 'legalization_id', 'id');
    }

    public function viaticRequest()
    {
        return $this->belongsTo(ViaticRequest::class, 'viatic_request_id', 'id');
    }
    public function supports()
    {
        return $this->hasMany(SupportsLegalization::class, 'legalization_id', 'id');
    }

    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->supports()->get() as $support) {
            $total += $support->total_factura;
        }
        return $total;
    }

    public function stateText()
    {
        return  EStateLegalization::from($this->sw_state)->getName();
    }
    public function stateColor()
    {
        return  EStateLegalization::from($this->sw_state)->getColor();
    }
}
