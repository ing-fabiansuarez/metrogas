<?php

namespace App\Exports;

use App\Models\Legalization;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LegalizationExport implements FromQuery, WithHeadings
{
    use Exportable;
    public function query()
    {
        return Legalization::query()
            ->join('supports_legalizations', 'legalizations.id', '=', 'supports_legalizations.legalization_id');
    }

    public function headings(): array
    {
        return [
            'Nro Soporte',
            'Justificación legalización',
            '',
            'Cod Empleado',
            'Estado',
            'Fecha Creación',
            'Fecha Actualización',
            'Nro Legalización',
            'Url Archivo',
            'Razon Social',
            'Fecha Factura',
            'Total Factura',
            'Tipo identificación',
            'Numero Identificación',
            'Descripcion soporte'
        ];
    }
}
