<?php

namespace App\Exports;

use App\Models\FormPersonaJuridica;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormPersonaJuridicaExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        $consulta =  FormPersonaJuridica::query()
            /* ->join('users', 'users.id', '=', 'viatic_requests.request_by')
            ->join('jobtitles', 'users.id_jobtitle', '=', 'jobtitles.id') */
            ->select([
                'form_persona_juridicas.id',
            ]);
        /* if ($this->start_date != null) {
            $consulta->where('viatic_requests.created_at', '>=', $this->start_date);
        }
        if ($this->end_date != null) {
            $consulta->where('viatic_requests.created_at', '<=', $this->end_date);
        }
        if ($this->employ != null) {
            $consulta->where('viatic_requests.request_by', $this->employ);
        } */
        if ($this->id != null) {
            $consulta->where('form_persona_juridicas.id', $this->id);
        }
        return $consulta;
    }


    public function headings(): array
    {
        return [
            'ID FORMULARIO',
        ];
    }
}
