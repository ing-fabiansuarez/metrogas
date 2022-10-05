<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StructureFormPersonaJuridicaBrutoExport implements WithMultipleSheets
{
    use Exportable;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new FormPersonaJuridicaBrutoExport($this->id);
        $sheets[] = new FormBeneficiariosFinalesPJExport($this->id);
        $sheets[] = new FormPersonasExpuestasPoliticamentePJExport($this->id);
        return $sheets;
    }
}
