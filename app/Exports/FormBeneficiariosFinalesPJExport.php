<?php

namespace App\Exports;

use App\Models\FormBeneficiariosFinalesPJ as ModelsFormBeneficiariosFinalesPJ;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class FormBeneficiariosFinalesPJExport implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        $consulta =  ModelsFormBeneficiariosFinalesPJ::query()
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
            $consulta->where('form_beneficiarios_finales_p_j_s.form_persona_juridica_id', $this->id);
        }
        return $consulta;
    }

    public function title(): string
    {
        return 'BENEFICIARIOS FINALES';
    }

    public function headings(): array
    {
        return [
            'ID BENEFICIARIO',
            'ID FORMULARIO',
            'RAZON SOCIAL',
            'TIPO IDENTIFICACIÓN',
            'NUMERO IDENTIFICACIÓN',
            'PORCENTAJE PARTICIPACIÓN',
            'FECHA DE CREACIÓN',
            'FECHA DE ACTUALIZACIÓN'
        ];
    }
}
