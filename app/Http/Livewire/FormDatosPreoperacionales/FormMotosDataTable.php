<?php

namespace App\Http\Livewire\FormDatosPreoperacionales;

use App\Enums\EBuenoMalo;
use App\Enums\ENivelAceite;
use App\Enums\ESiNo;
use Illuminate\Database\Eloquent\Builder;
use App\Models\FormDatosPreoperacionalesMotosModel;
use Doctrine\DBAL\Types\DateTimeTzType;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateTimeFilter;
use ZipArchive;

class FormMotosDataTable extends DataTableComponent
{
    protected $model = FormDatosPreoperacionalesMotosModel::class;

    public array $bulkActions = [
        'downloadSelected' => 'Descargar PDF',
    ];
    public function downloadSelected()
    {
        //elimino los archivos que estan en el pdf-temp
        Storage::disk('public')->deleteDirectory('pdf-tmp');
        //genero y guardo los pdf en el disco del servidor
        Storage::disk('public')->makeDirectory('pdf-tmp');

        foreach ($this->getSelected() as $id) {
            $item = FormDatosPreoperacionalesMotosModel::find($id);
            $pdf = App::make('dompdf.wrapper');
            $pdf->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('datos-preoperacionales.admin.pdf-dompdf-form-motos',  [
                'object' => $item,
                'solo_lectura' => true,
                'ENivelAceite' => ENivelAceite::cases(),
                'EBuenoMalo' => EBuenoMalo::cases(),
                'ESiNo' => ESiNo::cases()
            ]);
            $pdf->save('storage/pdf-tmp/' . $item->id . '.pdf');
        }

        //combierto en zip para descargarr lo que ya guarde



        // Zip File Name
        $zipFileName = storage_path('app/public/pdf-tmp') . '/Formularios.zip';
        // Create ZipArchive Obj
        $zip = new ZipArchive;


        if (file_exists($zipFileName)) {
            unlink($zipFileName);
        }

        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {

            $files = Storage::disk('public')->allFiles('pdf-tmp');


            foreach ($files as $file) {

                $ruta = storage_path("app/public/") . $file;

                // dd($ruta);
                $nombre = basename($ruta);
                // Add File in ZipArchive
                $zip->addFile($ruta, $nombre);
            }


            // Close ZipArchive     
            $zip->close();
        }
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath = $zipFileName;
        // Create Download Response
        if (file_exists($filetopath)) {
            return response()->download($zipFileName);
        }
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id')->setTableRowUrl(function ($row) {
            return route('admin.preoperacional.ver', $row);
        })->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),
            Column::make('Fecha y hora', 'created_at')
                ->sortable()
                ->searchable(),
            Column::make('Cedula', 'cedula')
                ->sortable()
                ->searchable(),
            Column::make('Nombre Completo', 'nombre_completo')
                ->sortable()
                ->searchable(),
            Column::make('Correo Electronico', 'correo')
                ->sortable()
                ->searchable(),
            Column::make('Lugar de trabajo', 'lugar_trabajo')
                ->sortable()
                ->searchable(),
            Column::make('Area', 'area')
                ->sortable()
                ->searchable(),
            Column::make('Placa', 'placa_vehiculo')
                ->sortable()
                ->searchable(),
            Column::make('')
                ->label(
                    function ($row, Column $column) {
                        $route =  route('admin.preoperacional.moto.imprimir.descargar', $row);
                        echo '<a href="' . $route . '" class="mx-2"><i class="fas fa-download text-secondary"></i></a>';
                    }
                )
                ->html(),
        ];
    }

    public function filters(): array
    {
        return [


            DateTimeFilter::make('Desde')
                ->filter(function (Builder $builder, string $value) {
                    $date_start = str_replace('T', ' ', $value) . ':00';
                    $builder->where('created_at', '>=', $date_start);
                }),
            DateTimeFilter::make('Hasta')
                ->filter(function (Builder $builder, string $value) {
                    $date_end = str_replace('T', ' ', $value) . ':00';
                    return $builder->where('created_at', '<=', $date_end);
                }),
        ];
    }
}
