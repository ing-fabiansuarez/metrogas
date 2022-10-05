<?php

namespace App\Exports;

use App\Enums\EGenero;
use App\Enums\ESiNo;
use App\Models\FormPersonaNatural;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FormPersonaNaturalExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        $consulta =  FormPersonaNatural::query()
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
            $consulta->where('form_persona_naturals.id', $this->id);
        }
        return $consulta;
    }


    //este metodo es en que se editan las filas, se debe implemtna el WithMapping y poner el metodo
    public function map($invoice): array
    {
        return [
            $invoice->id,
            "",
            "",
            "",
            $invoice->num_identificacion != null ? $invoice->num_identificacion : "",
            $invoice->nombres != null ? $invoice->nombres : "",
            $invoice->genero != null ? EGenero::from($invoice->genero)->getName() : "",
            $invoice->tipo_identificacion != null ? $invoice->tipo_identificacion : "",
            $invoice->fecha_nacimiento != null ? $invoice->fecha_nacimiento : "",
            $invoice->ciudad_nacimiento != null ? $invoice->ciudad_nacimiento : "",
            $invoice->telefono != null ? $invoice->telefono : "",
            $invoice->celular  != null ? $invoice->celular : "",
            $invoice->correo_electronico != null ? $invoice->correo_electronico : "",
            $invoice->direccion_domicilio != null ? $invoice->direccion_domicilio : "",
            $invoice->ciudad_domicilio != null ? $invoice->ciudad_domicilio : "",
            '',
            $invoice->codigo_actividad_CIIU_principal != null ? $invoice->codigo_actividad_CIIU_principal : "",
            $invoice->codigo_actividad_CIIU_principal != null ? $invoice->codigo_actividad_CIIU_principal : "",
            $invoice->ocupacion != null ? $invoice->ocupacion : "",
            $invoice->cargo_empresa != null ? $invoice->cargo_empresa : "",
            '',
            ESiNo::from($invoice->gran_contribuyente)->getName(),
            ESiNo::from($invoice->autorretenedor)->getName(),
            ESiNo::from($invoice->responsable_iva)->getName(),
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            $invoice->total_ingresos_mensuales,
            $invoice->total_egresos_mensuales,
            $invoice->otros_ingresos_mensuales,
            $invoice->otros_egresos_mensuales,
            $invoice->total_activos,
            $invoice->total_pasivos,
            '',
            ESiNo::from($invoice->es_declarante_de_renta)->getName(),
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        ];
    }


    public function headings(): array
    {
        return [
            'ID FORMULARIO',
            'TIPO DE CONTRAPARTE',
            'FASE IDENTIFICADA',
            'TERCEROS MATERIALES O INMATERIALES',
            'NUMERO DOCUMENTO',
            'NOMBRE COMPLETO (Cliente / Proveedor / Empleado / Accionista/Representante legal)',
            'GÉNERO',
            'TIPO DE DOCUMENTO',
            'FECHA DE NACIMIENTO',
            'LUGAR DE NACIMIENTO',
            'TELÉFONO FIJO',
            'TELÉFONO CELULAR',
            'CORREO ELECTRÓNICO',
            'DIRECCIÓN',
            'CIUDAD',
            'FECHA DE VINCULACIÓN ',
            'CODIGO ACTIVIDAD ECONÓMICA ',
            'CÓDIGO(S) ACTIVIDAD (ES) ECONÓMICA(S) SECUNDARIA(S)',
            'OCUPACIÓN',
            'Cargo',
            'FORMA JURIDICA',
            'GRAN CONTRIBUYENTE',
            'AUTORRETENEDOR',
            'RÉGIMEN IVA',
            'NOMBRE COMPLETO DEL REPRESENTANTE LEGAL',
            'TIPO DE DOCUMENTO DEL REPRESENTANTE LEGAL',
            'NÚMERO DE DOCUMENTO DEL REPRESENTANTE LEGAL',
            'DIRECCIÓN DE DOMICILIO DEL REPRESENTANTE LEGAL',
            'CIUDAD DE DOMICILIO DEL REPRESENTANTE LEGAL',
            'TELÉFONO DEL REPRESENTANTE LEGAL',
            'PEP',
            'BENEFICIARIO FINAL',
            'TIPO DE DOCUMENTACIÓN BENEFICIARIO FINAL ',
            'NUMERO DE DOCUMENTACIÓN BENEFICIARIO FINAL',
            'INDICAR SI EL BENEFICIARIO FINAL ES PEP',
            'NOMBRE DE LA PERSONA DE CONTACTO',
            'CARGO DE LA PERSONA DE CONTACTO',
            'CORREO DE LA PERSONA DE CONTACTO',
            'CELULAR PERSONA DE CONTACTO',
            'TOTAL INGRESOS MENSUALES',
            'TOTAL EGRESOS MENSUALES',
            'OTROS INGRESOS MENSUALES',
            'OTROS EGRESOS MENSUALES',
            'TOTAL ACTIVOS',
            'TOTAL PASIVOS',
            'TOTAL PATRMONIO',
            '¿ES DECLARANTE?',
            'MES Y AÑO DE LA INFORMACIÓN FINANCIERA SUMNISTRADA',
            'NOMBRE REFERENCIA COMERCIAL 1',
            'DIRECCIÓN REFERENCIA COMERCIAL 1',
            'CIUDAD REFERENCIA COMERCIAL 1',
            'TELÉFONO REFERENCIA COMERCIAL 1',
            'NOMBRE REFERENCIA COMERCIAL 2',
            'DIRECCIÓN REFERENCIA COMERCIAL 2',
            'CIUDAD REFERENCIA COMERCIAL 2',
            'TELÉFONO REFERENCIA COMERCIAL 2',
            'FECHA DE CONFIRMACIÓN DE LOS DATOS',
            'FECHA CONSULTA EN LISTAS RESTRICTIVAS Y SANCIONATORIAS',
            'CONFIRMACIÓN DE DOCUMENTACIÓN ADJUNTA',
            'CONFIRMACIÓN VERIFICACIÓN DE LA INFORMACIÓN',
            'CONSULTA EN LISTAS RESTRICTIVAS O VINCULENTES',
            'GASTOS REEEMBOLSABLES',
            'FECHA DEL CONTRATO',
            'OBJETO DEL CONTRATO',
            'VALOR DEL CONTRATO',
            'CASOS CORROBORADOS POR LÍNEA ÉTICA',
            'PUNTAJE EVALUACIÓN DE DESEMPEÑO',
            'ACTA DE COMPROMISO Y CUMPLIMIENTO DEL CÓDIGO DE ÉTICA',
            'DECLARACIÓN DE INDEPENDENCIA',
        ];
    }
}
