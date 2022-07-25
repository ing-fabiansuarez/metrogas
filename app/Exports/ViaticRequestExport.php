<?php

namespace App\Exports;

use App\Models\ViaticRequest;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ViaticRequestExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function query()
    {
        return ViaticRequest::query();
    }

    public function headings(): array
    {
        return [
            'Nro Anticipo',
            'Justificación',
            'Id Usuario',
            'Estado',
            'Url de firma de empleado',
            'Fecha Creación',
            'Fecha Actualización'
        ];
    }
}
