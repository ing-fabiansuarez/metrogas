<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StructureLegalizationExport implements WithMultipleSheets
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
    public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new LegalizationExport($this->id, $this->start_date, $this->end_date, $this->employ, $this->state);
        $sheets[] = new SupportsLegalizationExport($this->id, $this->start_date, $this->end_date, $this->employ, $this->state);
        return $sheets;
    }
}
