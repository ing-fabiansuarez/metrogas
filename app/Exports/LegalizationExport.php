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

class LegalizationExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize, WithTitle
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
        $consulta = Legalization::query()
            ->join('users', 'users.id', '=', 'legalizations.created_by')
            ->select([
                'legalizations.id',
                'legalizations.viatic_request_id',
                'legalizations.sw_state',
                'legalizations.created_at',
                'users.name',
                'users.username',
                'users.email_aux',
                'legalizations.justification'
            ])->orderBy('legalizations.id', 'asc');

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

    //este metodo es en que se editan las filas, se debe implemtna el WithMapping y poner el metodo
    public function map($invoice): array
    {
        return [
            [
                $invoice->id,
                $invoice->viatic_request_id == null ? 'Reintegro' : $invoice->viatic_request_id,
                EStateLegalization::from($invoice->sw_state)->getName(),
                Date::dateTimeToExcel($invoice->created_at),
                $invoice->name,
                $invoice->username,
                $invoice->email_aux,
                $invoice->justification,
            ]
        ];
    }
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings(): array
    {
        return [
            'N LEGALIZACION',
            'Reintegro/Anticipo',
            'ESTADO',
            'FECHA CREACION',
            'EMPLEADO',
            'USERNAME',
            'EMAIL',
            'JUSTIFICACION'
        ];
    }
    public function title(): string
    {
        return 'LEGALIZACIONES';
    }
}
