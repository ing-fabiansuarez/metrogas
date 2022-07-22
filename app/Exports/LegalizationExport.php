<?php

namespace App\Exports;

use App\Models\Legalization;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class LegalizationExport implements FromQuery
{
    use Exportable;
    public function query()
    {
        return Legalization::query()
            ->join('supports_legalizations', 'legalizations.id', '=', 'supports_legalizations.legalization_id');
    }
}
