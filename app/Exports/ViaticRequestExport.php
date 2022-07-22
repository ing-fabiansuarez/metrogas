<?php

namespace App\Exports;

use App\Models\ViaticRequest;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class ViaticRequestExport implements FromQuery
{
    use Exportable;
    
    public function query()
    {
        return ViaticRequest::query();
    }
}
