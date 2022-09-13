<?php

namespace App\Http\Livewire\FormProveedores;

use App\Enums\ESiNo;
use App\Enums\ETipoEmpresa;
use App\Models\FormPersonaJuridica as ModelsFormPersonaJuridica;
use App\Models\TypeIdentification;
use Livewire\Component;
use Symfony\Component\HttpKernel\HttpCache\Esi;

class FormPersonaJuridica extends Component
{

    public ModelsFormPersonaJuridica $personaJuridica;

    public $solo_lectura;

    protected $rules = [
        'personaJuridica.razon_social' => 'required',
        'personaJuridica.nit' => 'required',
        'personaJuridica.digito_verificador' => 'required',
        
        
        'personaJuridica.sigla' => 'required',
        'personaJuridica.direccion_principal' => 'required',
        'personaJuridica.tipo_empresa' => 'required',
        'personaJuridica.pagina_web' => 'required',
        'personaJuridica.correo_electronico_notificacion' => 'required',
        'personaJuridica.celular' => 'required',
        'personaJuridica.telefono_fijo' => 'required',
        
        'personaJuridica.gran_contribuyente' => 'required',
        'personaJuridica.autorretenedor' => 'required',
        'personaJuridica.responsable_iva' => 'required',
        'personaJuridica.rst' => 'required',
        'personaJuridica.codigo_ciiu_actividad_principal' => 'required',
        'personaJuridica.descripcion_actividad__ciiu' => 'required',
        
        'personaJuridica.esta_obligada' => 'required',
        'personaJuridica.tiene_implementado_un_sistema_de_administracion_de_riesgo_de_lavado_de_activos' => 'required',
        
        'personaJuridica.rl_nombre' => 'required',
        'personaJuridica.rl_apellido' => 'required',
        'personaJuridica.rl_tipo_documento' => 'required',
        'personaJuridica.rl_num_docuemnto' => 'required',
        'personaJuridica.rl_fecha_expedicion' => 'required',
        'personaJuridica.rl_ciudad_expedicion' => 'required',
        'personaJuridica.rl_administra_recursos_publicos_o_es_pep' => 'required',
        'personaJuridica.rl_persona_expuesta_pliticamente_extrajera' => 'required',
        'personaJuridica.rl_persona_expuesta_politicamente_de_organizaciones_internacionales' => 'required',
        'personaJuridica.rl_tiene_relecionados_cercanos_expuestos_politicamente' => 'required',
        
        
        'personaJuridica.bf_administra_recursos_publicos_o_es_pep' => 'required',
        'personaJuridica.bf_persona_expuesta_pliticamente_extrajera' => 'required',
        'personaJuridica.bf_persona_expuesta_politicamente_de_organizaciones_internacionales' => 'required',
        'personaJuridica.bf_tiene_relecionados_cercanos_expuestos_politicamente' => 'required',
        
        'personaJuridica.if_total_ingresos' => 'required',
        'personaJuridica.if_total_egresos' => 'required',
        'personaJuridica.if_otros_ingresos' => 'required',
        'personaJuridica.if_otros_egresos' => 'required',
        'personaJuridica.if_total_activos' => 'required',
        'personaJuridica.if_total_pasivos' => 'required',
        'personaJuridica.if_mes_corte_informacion_financiera' => 'required',
        'personaJuridica.if_ano_corte_informacion_financiera' => 'required',
        'personaJuridica.if_declarante_de_renta' => 'required',
        'personaJuridica.oi_realiza_op_internacionales' => 'required',
        'personaJuridica.oi_posee_cuentas_en_moneda_extranjera' => 'required',
        'personaJuridica.oi_nombre_de_entidad_financiera' => 'required',
        'personaJuridica.oi_ciudad' => 'required',
        'personaJuridica.oi_pais' => 'required',
        'personaJuridica.oi_monto_promedio_mensual' => 'required',
        'personaJuridica.oi_moneda' => 'required',
        'personaJuridica.oi_importaciones' => 'required',
        'personaJuridica.oi_exportaciones' => 'required',
        'personaJuridica.oi_inversiones' => 'required',
        'personaJuridica.oi_prestamos_m_e' => 'required',
        
        'personaJuridica.fe_factura_electronica' => 'required',
        'personaJuridica.fe_fecha_desde_que_factura' => 'required',
        'personaJuridica.fe_envio_nombre' => 'required',
        'personaJuridica.fe_envio_cargo' => 'required',
        'personaJuridica.fe_envio_correo_electronico' => 'required',
        'personaJuridica.fe_recepcion_nombre' => 'required',
        'personaJuridica.fe_recepcion_cargo' => 'required',
        'personaJuridica.fe_recepcion_correo_electronico' => 'required',
        
        
        'personaJuridica.do_declaro_origen_de_fondos' => 'required',
        'personaJuridica.do_declaro_que_posee_la_entidad' => 'required',
        'personaJuridica.do_declaro_que_los_recursos_recibidos_por_las' => 'required',
        
        
        
        'personaJuridica.rc_nombre_del_establecimiento' => 'required',
        'personaJuridica.rc_nombre_del_contacto' => 'required',
        'personaJuridica.rc_direccion' => 'required',
        'personaJuridica.rc_ciudad' => 'required',
        'personaJuridica.rc_telefono' => 'required',
        
        
        'personaJuridica.cer_asi_las_cosas' => 'required',
        'personaJuridica.cer_entidad' => 'required',
        'personaJuridica.cer_obligada_laftpadm' => 'required',
        'personaJuridica.cer_cumple_nomrmas' => 'required',
        'personaJuridica.cer_cuenta_con_adecuadas_pliticas' => 'required',
        'personaJuridica.cer_ha_estado_involucrada' => 'required',
        'personaJuridica.cer_ha_sido_sancionada' => 'required',
        'personaJuridica.cer_nombres' => 'required',
        'personaJuridica.cer_apellidos' => 'required',
        'personaJuridica.cer_telefono' => 'required',
        'personaJuridica.cer_correo_electronico' => 'required',
        'personaJuridica.cer_direccion' => 'required',

        'personaJuridica.terminos_y_condiciones' => 'required',
    ];

    public function render()
    {
        return view('livewire.form-proveedores.form-persona-juridica', [
            'tiposEmpresas' => ETipoEmpresa::cases(),
            'Esino' => ESiNo::cases(),
            'tipoIdentificaciones' => TypeIdentification::all()
        ]);
    }

    public function mount($solo_lectura = false, ModelsFormPersonaJuridica $personaJuridica = new ModelsFormPersonaJuridica())
    {
        $this->personaJuridica = $personaJuridica;
        $this->solo_lectura = $solo_lectura;
    }

    public function save()
    {
        $this->validate();

        $this->personaJuridica->save();

        return redirect()->route('proveedor.register.finalizado');
    }
}
