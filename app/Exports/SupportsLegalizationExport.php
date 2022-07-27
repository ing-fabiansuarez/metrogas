<?php

namespace App\Exports;

use App\Enums\EStateLegalization;
use App\Models\Legalization;
use App\Models\SupportsLegalization;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;

class SupportsLegalizationExport implements FromQuery, WithHeadings, ShouldAutoSize, WithTitle
{
    use Exportable;
    public function __construct($id, $start_date, $end_date, $employ, $state)
    {
        $this->id = $id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->employ = $employ;
        $this->state = $state;
    }
    public function query()
    {
        $consulta = SupportsLegalization::query()
            ->join('type_identifications', 'type_identifications.id', '=', 'supports_legalizations.type_identification')
            ->join('legalizations', 'legalizations.id', '=', 'supports_legalizations.legalization_id')
            ->select([
                'supports_legalizations.legalization_id',
                'supports_legalizations.id',
                'supports_legalizations.date_factura',
                'supports_legalizations.total_factura',
                'supports_legalizations.company',
                'type_identifications.abrev',
                'supports_legalizations.number_identification',
                'supports_legalizations.created_at',
                'supports_legalizations.observation'
            ])->orderBy('legalizations.id', 'asc');;
        if ($this->id != null) {
            $consulta->where('legalizations.id', $this->id);
        }
        if ($this->start_date != null) {
            $consulta->where('legalizations.created_at', '>=', $this->start_date);
        }
        if ($this->end_date != null) {
            $consulta->where('legalizations.created_at', '<=', $this->end_date);
        }
        if ($this->employ != null) {
            $consulta->where('legalizations.created_by', $this->employ);
        }
        if ($this->state != null) {
            $consulta->where('legalizations.sw_state', $this->state);
        }
        return $consulta;
    }

    public function headings(): array
    {
        return [
            'N LEGALIZACION',
            'ID SOPORTE',
            'FECHA FACTURA',
            'TOTAL FACTURA',
            'RAZON SOCIAL / NOMBRE EMPRESA',
            'TIPO IDENTIFICACION',
            'NUMERO IDENTIFICACION',
            'FECHA DE CREACION',
            'OBSERVACION'
        ];
    }



    public function title(): string
    {
        return 'SOPORTES';
    }
}
