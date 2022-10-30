<?php

namespace App\Exports;

use App\Enums\EBuenoMalo;
use App\Enums\ESiNo;
use App\Models\FormDatosPreoperacionalesMotosModel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FormDatosPreoperacionalesMotosExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct()
    {
    }
    public function query()
    {
        $consulta =  FormDatosPreoperacionalesMotosModel::query()
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
            '1. Luz Delantera',
            '2. Direccionales Delanteros',
            '3. Direccionales Traseros',
            '4. Stop',
            '5. La Llanta delantera tiene labrado y presión adecuada',
            '6. La Llanta trasera tiene labrado y presión adecuada',
            '7. El Rin Delantero está en buenas condiciones',
            '8. Rin Trasero está en buenas condiciones',
            '10. Los testigos del Tacómetro son funcionales',
            '11. El Tanque de Gasolina tiene fugas o abolladuras',
            '12. El Cojín es ergonómico y se encuentra en buen estado',
            '13. Tiene la Placa en un lugar visible',
            '14. La moto está aseada',
            '15. Los comandos del acelerador están en buen estado',
            '16. Tiene buena holgura y funciona el Freno Delantero',
            '17. Tiene buena holgura y funciona el Freno Trasero',
            '18. La Relación está en buenas condiciones Revisar: Tensión y estado de piñones',
            '19. La Suspensión está en buen estado',
            '20. Buen nivel de fluidos Revisar: Nivel de aceite y liquido de frenos',
            '21. Dirección (Ajuste del sistema)',
            '22. El Pito es de moto y está en buenas condiciones',
            '23. Los Espejos Retrovisores están en buen estado',
            '24. Se dispone de Casco Certificado con visera',
            '25. Se dispone de Chaleco o uniforme reflectivo',
            '26. Se dispone de Coderas y rodilleras para moto',
            '27. Se dispone de Guantes de moto',
            '28. Esta en buen estado el reposapies',
            '26. SOAT',
            '27. RTM',
            '28. Licencia de conducción',
            '29. Tarjeta de propiedad',
            'Observaciones',
            'Fotografía del tacómetro',
            'Fotografía de mantenimiento',
            'He diligenciado personalmente el documento de inspección preoperacional',
        ];
    }

    public function map($invoice): array
    {

        return [
            $invoice->id,
            $invoice->correo,
            $invoice->lugar_trabajo,
            $invoice->nombre_completo,
            $invoice->cedula, $invoice->area,
            $invoice->cargo, $invoice->placa_vehiculo,
            $invoice->modelo,
            $invoice->kilometraje_inicio_jornada,
            $invoice->niveles_aceite,
            EBuenoMalo::from($invoice->luz_delantera)->getName(),
            EBuenoMalo::from($invoice->direccionales_delantera)->getName(),
            EBuenoMalo::from($invoice->direccionales_traseras)->getName(),
            EBuenoMalo::from($invoice->stop)->getName(),
            ESiNo::from($invoice->presion_labrado_llanta_delantera)->getName(),
            ESiNo::from($invoice->presion_labrado_llanta_trasera)->getName(),
            ESiNo::from($invoice->rin_delantero)->getName(),
            ESiNo::from($invoice->rin_trasero)->getName(),
            ESiNo::from($invoice->testigos_tacometros)->getName(),
            ESiNo::from($invoice->tanque_gasolina)->getName(),
            ESiNo::from($invoice->cojin_argonomico)->getName(),
            ESiNo::from($invoice->placa_visible)->getName(),
            ESiNo::from($invoice->moto_aseada)->getName(),
            ESiNo::from($invoice->comandos_acelerador_buen_estado)->getName(), ESiNo::from($invoice->freno_delantero)->getName(),
            ESiNo::from($invoice->freno_trasero)->getName(), ESiNo::from($invoice->relacion)->getName(),
            ESiNo::from($invoice->suspencion)->getName(),
            ESiNo::from($invoice->niveles_fluidos)->getName(), ESiNo::from($invoice->direccion)->getName(),
            ESiNo::from($invoice->pito)->getName(),
            ESiNo::from($invoice->espejos_retrovisores)->getName(),
            ESiNo::from($invoice->casco_certificado)->getName(),
            ESiNo::from($invoice->chaleco)->getName(),
            ESiNo::from($invoice->coderas_rodilleras)->getName(),
            ESiNo::from($invoice->guantes)->getName(),
            ESiNo::from($invoice->reposapies)->getName(),
            ESiNo::from($invoice->soat)->getName(),
            ESiNo::from($invoice->rtm)->getName(),
            ESiNo::from($invoice->licencia_de_conduccion)->getName(), ESiNo::from($invoice->tarjeta_de_propiedad)->getName(),
            $invoice->observacion,
            $invoice->fotografia_tacometro == null ? "No sube" : url(Storage::url($invoice->fotografia_tacometro)),
            $invoice->fotografia_mantenimiento == null ? "No Sube" : url(Storage::url($invoice->fotografia_mantenimiento)),
            ESiNo::from($invoice->ha_diligenciado_ud_mismo)->getName(),
        ];
    }
}
