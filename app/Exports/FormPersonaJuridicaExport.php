<?php

namespace App\Exports;

use App\Enums\ESiNo;
use App\Models\FormPersonaJuridica;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class FormPersonaJuridicaExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping, WithTitle
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
            $consulta->where('form_persona_juridicas.id', $this->id);
        }
        return $consulta;
    }

    public function map($invoice): array
    {
        return [
            $invoice->id,
            '',
            '',
            '',
            $invoice->nit . '-' . $invoice->digito_verificador,
            $invoice->razon_social,
            '',
            'NIT',
            '',
            '',
            $invoice->telefono_fijo,
            $invoice->celular,
            $invoice->correo_electronico_notificacion,
            $invoice->direccion_principal,
            '',
            '',
            $invoice->codigo_ciiu_actividad_principal,
            '',
            '',
            '',
            '',
            ESiNo::from($invoice->gran_contribuyente)->getName(),
            ESiNo::from($invoice->autorretenedor)->getName(),
            ESiNo::from($invoice->responsable_iva)->getName(),
            $invoice->rl_nombre . " " .  $invoice->rl_apellido,
            $invoice->rl_tipo_documento,
            $invoice->rl_num_docuemnto,
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
            $invoice->if_total_ingresos,
            $invoice->if_total_egresos,
            $invoice->if_otros_ingresos,
            $invoice->if_otros_egresos,
            $invoice->if_total_activos,
            $invoice->if_total_pasivos,
            '',
            ESiNo::from($invoice->if_declarante_de_renta)->getName(),
            $invoice->if_mes_corte_informacion_financiera . "/" . $invoice->if_ano_corte_informacion_financiera,
            $invoice->rc_nombre_del_establecimiento . " - " . $invoice->rc_nombre_del_contacto,
            $invoice->rc_direccion,
            $invoice->rc_ciudad,
            $invoice->rc_telefono,
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
    public function title(): string
    {
        return 'FORMULARIOS';
    }
}
