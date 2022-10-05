<?php

namespace App\Exports;

use App\Models\FormBeneficiariosFinalesPJ as ModelsFormBeneficiariosFinalesPJ;
use App\Models\FormPersonasExpuestasPoliticamentePJ;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class FormPersonasExpuestasPoliticamentePJExport implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        $consulta =  FormPersonasExpuestasPoliticamentePJ::query()
            /* ->join('users', 'users.id', '=', 'viatic_requests.request_by')
            ->join('jobtitles', 'users.id_jobtitle', '=', 'jobtitles.id') */
            ->select([
                '*',
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
            $consulta->where('form_personas_expuestas_politicamente_p_j_s.form_persona_juridica_id', $this->id);
        }
        return $consulta;
    }

    public function title(): string
    {
        return 'PERSONAS EXPUESTAS POLITICAMENTE';
    }

    public function headings(): array
    {
        return [
            'ID PERSONA',
            'ID FORMULARIO',
            'CATEGORIA',
            'NOMBRE',
            'GRADO DE PARENTEZCO',
            'TIPO DE IDENTIFICACIÓN',
            'NÚMERO DE IDENTIFICACIÓN',
            'ENTIDAD',
            'CARGO',
            'FECHA DE VINCULACIÓN',
            'FECHA DE DESVINCULACIÓN',
            'FECHA DE CREACIÓN',
            'FECHA DE ACTUALIZACIÓN'
        ];
    }
}
