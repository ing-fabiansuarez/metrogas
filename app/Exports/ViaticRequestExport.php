<?php

namespace App\Exports;

use App\Enums\EStateRequest;
use App\Models\ViaticRequest;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ViaticRequestExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize
{
    use Exportable;

    public function __construct($start_date, $end_date, $employ, $state)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->employ = $employ;
        $this->state = $state;
    }

    public function query()
    {
        $consulta =  ViaticRequest::query()
            ->join('users', 'users.id', '=', 'viatic_requests.request_by')
            ->join('jobtitles', 'users.id_jobtitle', '=', 'jobtitles.id')
            ->select([
                'viatic_requests.id',
                'viatic_requests.sw_state',
                'viatic_requests.created_at',
                'users.name',
                'users.username',
                'users.email_aux',
                'viatic_requests.justification'
            ]);
        if ($this->start_date != null) {
            $consulta->where('viatic_requests.created_at', '>=', $this->start_date);
        }
        if ($this->end_date != null) {
            $consulta->where('viatic_requests.created_at', '<=', $this->end_date);
        }
        if ($this->employ != null) {
            $consulta->where('viatic_requests.request_by', $this->employ);
        }
        if ($this->state != null) {
            $consulta->where('viatic_requests.sw_state', $this->state);
        }
        return $consulta;
    }

    //este metodo es en que se editan las filas, se debe implemtna el WithMapping y poner el metodo
    public function map($invoice): array
    {
        return [
            $invoice->id,
            EStateRequest::from($invoice->sw_state)->getName(),
            Date::dateTimeToExcel($invoice->created_at),
            $invoice->name,
            $invoice->username,
            $invoice->email_aux,
            $invoice->justification
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings(): array
    {
        return [
            'ID SOLICITUD',
            'ESTAD',
            'FECHA CREACION',
            'SOLICITADO POR',
            'USERNAME',
            'CORREO ELECTRONICO',
            'JUSTIFICACION',
        ];
    }
}
