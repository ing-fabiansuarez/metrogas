<?php

namespace App\Exports;

use App\Enums\EBuenoMalo;
use App\Enums\ESiNo;
use App\Models\FormDatosPreoperacionalesCarrosModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class FormDatosPreoperacionalesCarrosExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping,  WithColumnFormatting
{
    use Exportable;

    public function __construct()
    {
    }
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function query()
    {
        $consulta =  FormDatosPreoperacionalesCarrosModel::query()
            ->select([
                '*'
            ]);
        /* if ($this->start_date != null) {
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
        } */
        return $consulta;
    }


    public function headings(): array
    {
        return [
            'ID',
            'Fecha',
            'Correo Electronico',
            'Centro Operativo',
            'Nombres Completos',
            'Número de Cedula',
            'Area',
            'Cargo',
            'Placas Vehiculo',
            'Modelo',
            'Kilometraje inicio de la jornada',
            'Niveles de Aceite',
            '1. Luces retroceso y parqueo',
            '2. Luces altas y bajas',
            '3. Direccionales delanteras, parqueo y giro',
            '4. Direccionales traseras, parqueo y giro',
            '5.Pito o Bocina',
            '7. Espejos central y laterales',
            '8. Puertas de Acceso al Vehículo',
            '9. El Vidrio frontal',
            '10. Vidrios laterales y trasero',
            '11. Indicadores(hidráulico, velocímetro, temperatura, combustible) son funcionales',
            '12. Todas las ruedas tienen sus espárragos completos',
            '13. Están en buen estado sin cortaduras profundas, ni abultamientos',
            '14. La llanta de repuesto y equipo para cambio de llantas existen y están en buen estado',
            '15. Presión de inflado de las llantas es adecuada(Revisión visual)',
            '16. Caja de cambios',
            '17. Los pedales (acelerador, freno, cloche)',
            '18. Latas y pintura',
            '19. Freno de emergencia',
            '20. Buen nivel de fluidos, hidráulico, refrigerante, dirección, frenos y agua batería',
            '21. Conos reflectivos',
            '22. Gato con capacidad para elevar el vehículo.',
            '23. Linterna',
            '24. Cruceta',
            '25. Dos señales de carretera en forma de triángulo en material reflectivo y provistas de soportes para ser colocadas en forma vertical o lámparas de señal de luz amarilla intermitentes o de destello',
            '26. Dos tacos para bloquear el vehículo.',
            '27. La Caja de herramienta básica como mínimo contiene: Alicate, destornilladores, llave de expansión y llaves fijas',
            '28. Llanta de repuesto',
            '29. Extintor vigente y en buen estado',
            '30. Botiquín con todos los elementos vigentes y en buen estado',
            '31. SOAT',
            '32. RTM (revisión técnico mecánica)',
            '33. Licencia de conducción',
            '34. Tarjeta de propiedad',
            'Observacion',
            'Fotografía del vehículo',
            'Fotografía de mantenimiento',
            'He diligenciado personalmente el documento de inspección preoperacional'
        ];
    }

    public function map($invoice): array
    {

        return [
            $invoice->id,
            Date::dateTimeToExcel($invoice->created_at),
            $invoice->correo,
            $invoice->lugar_trabajo,
            $invoice->nombre_completo,
            $invoice->cedula, $invoice->area,
            $invoice->cargo, $invoice->placa_vehiculo,
            $invoice->modelo,
            $invoice->kilometraje_inicio_jornada,
            $invoice->niveles_aceite,


            EBuenoMalo::from($invoice->luces_retroceso_parqueo)->getName(),
            EBuenoMalo::from($invoice->luces_altas_bajas)->getName(),
            EBuenoMalo::from($invoice->direccionales_delanteras)->getName(),
            EBuenoMalo::from($invoice->direccionales_traseras)->getName(),


            EBuenoMalo::from($invoice->pito_bocina)->getName(),


            EBuenoMalo::from($invoice->espejos_centrales_laterales)->getName(),
            EBuenoMalo::from($invoice->puertas_acceso_vehiculo)->getName(),
            EBuenoMalo::from($invoice->vidrio_frontal)->getName(),
            EBuenoMalo::from($invoice->vidrios_laterales_trasero)->getName(),
            EBuenoMalo::from($invoice->indicadores)->getName(),


            ESiNo::from($invoice->llantas_esparragos)->getName(),
            ESiNo::from($invoice->rudas_buen_estado)->getName(),
            ESiNo::from($invoice->llanta_repuesto)->getName(),
            ESiNo::from($invoice->presion)->getName(),


            EBuenoMalo::from($invoice->caja_cambios)->getName(),
            EBuenoMalo::from($invoice->pedales)->getName(),
            EBuenoMalo::from($invoice->latas_pintura)->getName(),
            EBuenoMalo::from($invoice->freno_emergencia)->getName(),
            EBuenoMalo::from($invoice->nivel_fluidos)->getName(),


            ESiNo::from($invoice->conos_reflectivos)->getName(),
            ESiNo::from($invoice->gato)->getName(),
            ESiNo::from($invoice->linterna)->getName(),
            ESiNo::from($invoice->cruceta)->getName(),
            ESiNo::from($invoice->senales)->getName(),
            ESiNo::from($invoice->tacos)->getName(),
            ESiNo::from($invoice->caja_herramienta)->getName(),
            ESiNo::from($invoice->llantas_repuesto)->getName(),


            ESiNo::from($invoice->extintor)->getName(),
            ESiNo::from($invoice->botiquin)->getName(),


            ESiNo::from($invoice->soat)->getName(),
            ESiNo::from($invoice->rtm)->getName(),
            ESiNo::from($invoice->licencia_conduccion)->getName(),
            ESiNo::from($invoice->tarjeta_propuedad)->getName(),

            $invoice->observacion,

            $invoice->fotografia_vehiculos == null ? "No Subido" : url(Storage::url($invoice->fotografia_vehiculos)),
            $invoice->fotografia_mantenimiento == null ? "No Subido" : url(Storage::url($invoice->fotografia_mantenimiento)),

            ESiNo::from($invoice->ha_diligenciado_ud_mismo)->getName(),
        ];
    }
}
