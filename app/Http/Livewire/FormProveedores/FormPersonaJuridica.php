<?php

namespace App\Http\Livewire\FormProveedores;

use App\Enums\ESiNo;
use App\Enums\ETipoEmpresa;
use App\Models\FormBeneficiariosFinalesPJ;
use App\Models\FormPersonaJuridica as ModelsFormPersonaJuridica;
use App\Models\FormPersonasExpuestasPoliticamentePJ;
use App\Models\TypeIdentification;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\HttpKernel\HttpCache\Esi;

class FormPersonaJuridica extends Component
{
    use WithFileUploads;

    public ModelsFormPersonaJuridica $personaJuridica;

    public $solo_lectura;


    //LISTADO PERSONAS POLITICAMENTE EXPUESTAS REPRESENTANTE LEGAL
    public $listPersonasExpuestasPoliticamenteRL;
    public $nombreRL;
    public $grado_de_parentezcoRL;
    public $tipo_de_identificacionRL;
    public $numero_de_identificacionRL;
    public $entidadRL;
    public $cargoRL;
    public $fecha_vinculacionRL;
    public $fecha_desvinculacionRL;


    //LISTADO PERSONAS POLITICAMENTE EXPUESTAS BENEFICIARIOS FINALES
    public $listPersonasExpuestasPoliticamenteBF;
    public $nombreBF;
    public $grado_de_parentezcoBF;
    public $tipo_de_identificacionBF;
    public $numero_de_identificacionBF;
    public $entidadBF;
    public $cargoBF;
    public $fecha_vinculacionBF;
    public $fecha_desvinculacionBF;

    //BENEFICIARIO FINAL
    public $listBeneficiariosFinales;
    public $bf_razon_social;
    public $bf_tipo_identificacion;
    public $bf_numero_identificacion;
    public $bf_participacion_capital;


    //SOPORTES
    public $support_clausula_cumplimiento_codigo;
    public $support_camara_de_comercio;
    public $support_documento_representante_legal;
    public $support_certificacion_bancaria;
    public $support_rut;
    public $support_estados_financieros_compartivos;
    public $support_declaracion_de_renta;
    public $support_certificado_implementacion_sg_sst;
    public $support_certificado_implementacion_bioseguridad;
    public $support_certificado_experiencia_contractual;
    public $support_certificados_tecnicas_categoria;
    public $support_referencia_comercial;
    public $support_carta_autorizacion_fondos_rl;
    public $support_certificacion_de_normativa_riesgos;


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
        //'personaJuridica.fe_recepcion_nombre' => 'required',
        //'personaJuridica.fe_recepcion_cargo' => 'required',
        //'personaJuridica.fe_recepcion_correo_electronico' => 'required',


        'personaJuridica.do_declaro_origen_de_fondos' => 'required',
        'personaJuridica.do_declaro_que_posee_la_entidad' => 'required',
        //'personaJuridica.do_declaro_que_los_recursos_recibidos_por_las' => '',



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

        'personaJuridica.nombre_quien_diligencia' => 'required',
        'personaJuridica.cedula_quien_diligencia' => 'required',
        'personaJuridica.celular_quien_diligencia' => 'required',
        'personaJuridica.cargo_quien_diligencia' => 'required',

        'personaJuridica.forma_juridica' => 'required',
        'personaJuridica.ciudad_infor_solicitante' => 'required',


        'support_clausula_cumplimiento_codigo' => '',
        'support_camara_de_comercio' => 'required',
        'support_documento_representante_legal' => 'required',
        'support_certificacion_bancaria' => 'required',
        'support_rut' => 'required',
        'support_estados_financieros_compartivos' => 'required',
        'support_declaracion_de_renta' => '',
        'support_certificado_implementacion_sg_sst' => '',
        'support_certificado_implementacion_bioseguridad' => '',
        'support_certificado_experiencia_contractual' => '',
        'support_certificados_tecnicas_categoria' => '',
        'support_referencia_comercial' => '',
        'support_carta_autorizacion_fondos_rl' => '',
        'support_certificacion_de_normativa_riesgos' => '',





    ];

    /* protected $rules = [
        'personaJuridica.razon_social' => 'required',
        'personaJuridica.nit' => '',
        'personaJuridica.digito_verificador' => '',


        'personaJuridica.sigla' => '',
        'personaJuridica.direccion_principal' => '',
        'personaJuridica.tipo_empresa' => '',
        'personaJuridica.pagina_web' => '',
        'personaJuridica.correo_electronico_notificacion' => '',
        'personaJuridica.celular' => '',
        'personaJuridica.telefono_fijo' => '',

        'personaJuridica.gran_contribuyente' => '',
        'personaJuridica.autorretenedor' => '',
        'personaJuridica.responsable_iva' => '',
        'personaJuridica.rst' => '',
        'personaJuridica.codigo_ciiu_actividad_principal' => '',
        'personaJuridica.descripcion_actividad__ciiu' => '',

        'personaJuridica.esta_obligada' => '',
        'personaJuridica.tiene_implementado_un_sistema_de_administracion_de_riesgo_de_lavado_de_activos' => '',

        'personaJuridica.rl_nombre' => '',
        'personaJuridica.rl_apellido' => '',
        'personaJuridica.rl_tipo_documento' => '',
        'personaJuridica.rl_num_docuemnto' => '',
        'personaJuridica.rl_fecha_expedicion' => '',
        'personaJuridica.rl_ciudad_expedicion' => '',
        'personaJuridica.rl_administra_recursos_publicos_o_es_pep' => '',
        'personaJuridica.rl_persona_expuesta_pliticamente_extrajera' => '',
        'personaJuridica.rl_persona_expuesta_politicamente_de_organizaciones_internacionales' => '',
        'personaJuridica.rl_tiene_relecionados_cercanos_expuestos_politicamente' => '',


        'personaJuridica.bf_administra_recursos_publicos_o_es_pep' => '',
        'personaJuridica.bf_persona_expuesta_pliticamente_extrajera' => '',
        'personaJuridica.bf_persona_expuesta_politicamente_de_organizaciones_internacionales' => '',
        'personaJuridica.bf_tiene_relecionados_cercanos_expuestos_politicamente' => '',

        'personaJuridica.if_total_ingresos' => '',
        'personaJuridica.if_total_egresos' => '',
        'personaJuridica.if_otros_ingresos' => '',
        'personaJuridica.if_otros_egresos' => '',
        'personaJuridica.if_total_activos' => '',
        'personaJuridica.if_total_pasivos' => '',
        'personaJuridica.if_mes_corte_informacion_financiera' => '',
        'personaJuridica.if_ano_corte_informacion_financiera' => '',
        'personaJuridica.if_declarante_de_renta' => '',
        'personaJuridica.oi_realiza_op_internacionales' => '',
        'personaJuridica.oi_posee_cuentas_en_moneda_extranjera' => '',
        'personaJuridica.oi_nombre_de_entidad_financiera' => '',
        'personaJuridica.oi_ciudad' => '',
        'personaJuridica.oi_pais' => '',
        'personaJuridica.oi_monto_promedio_mensual' => '',
        'personaJuridica.oi_moneda' => '',
        'personaJuridica.oi_importaciones' => '',
        'personaJuridica.oi_exportaciones' => '',
        'personaJuridica.oi_inversiones' => '',
        'personaJuridica.oi_prestamos_m_e' => '',

        'personaJuridica.fe_factura_electronica' => '',
        'personaJuridica.fe_fecha_desde_que_factura' => '',
        'personaJuridica.fe_envio_nombre' => '',
        'personaJuridica.fe_envio_cargo' => '',
        'personaJuridica.fe_envio_correo_electronico' => '',
        'personaJuridica.fe_recepcion_nombre' => '',
        'personaJuridica.fe_recepcion_cargo' => '',
        'personaJuridica.fe_recepcion_correo_electronico' => '',


        'personaJuridica.do_declaro_origen_de_fondos' => '',
        'personaJuridica.do_declaro_que_posee_la_entidad' => '',
        //'personaJuridica.do_declaro_que_los_recursos_recibidos_por_las' => '',



        'personaJuridica.rc_nombre_del_establecimiento' => '',
        'personaJuridica.rc_nombre_del_contacto' => '',
        'personaJuridica.rc_direccion' => '',
        'personaJuridica.rc_ciudad' => '',
        'personaJuridica.rc_telefono' => '',


        'personaJuridica.cer_asi_las_cosas' => '',
        'personaJuridica.cer_entidad' => '',
        'personaJuridica.cer_obligada_laftpadm' => '',
        'personaJuridica.cer_cumple_nomrmas' => '',
        'personaJuridica.cer_cuenta_con_adecuadas_pliticas' => '',
        'personaJuridica.cer_ha_estado_involucrada' => '',
        'personaJuridica.cer_ha_sido_sancionada' => '',
        'personaJuridica.cer_nombres' => '',
        'personaJuridica.cer_apellidos' => '',
        'personaJuridica.cer_telefono' => '',
        'personaJuridica.cer_correo_electronico' => '',
        'personaJuridica.cer_direccion' => '',

        'personaJuridica.terminos_y_condiciones' => '',


        'support_clausula_cumplimiento_codigo' => '',
        'support_camara_de_comercio' => 'required',
        'support_documento_representante_legal' => 'required',
        'support_certificacion_bancaria' => 'required',
        'support_rut' => 'required',
        'support_estados_financieros_compartivos' => 'required',
        'support_declaracion_de_renta' => 'required',
        'support_certificado_implementacion_sg_sst' => 'required',
        'support_certificado_implementacion_bioseguridad' => '',
        'support_certificado_experiencia_contractual' => '',
        'support_certificados_tecnicas_categoria' => '',
        'support_referencia_comercial' => '',
        'support_carta_autorizacion_fondos_rl' => '',
        'support_certificacion_de_normativa_riesgos' => '',
    ]; */

    protected $listeners = [
        'addPersonaExpuestaPoliticamenteRL',
        'deleteItemListPersonasExpuestasPoliticamenteRL',
        'addPersonaExpuestaPoliticamenteBF',
        'deleteItemListPersonasExpuestasPoliticamenteBF',
        'addListBeneficiariosFinales',
        'deleteListBeneficiariosFinales'
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
        $this->listPersonasExpuestasPoliticamenteRL = [];
        $this->listPersonasExpuestasPoliticamenteBF = [];
        $this->listBeneficiariosFinales = [];

        if ($this->personaJuridica != null) {
            foreach ($this->personaJuridica->personasPoliticamenteExpuestas as $persona) {
                if ($persona->categoria == 1) {
                    array_push($this->listPersonasExpuestasPoliticamenteRL, [
                        'nombre' => $persona->nombre,
                        'grado_de_parentezco' => $persona->grado_de_parentezco,
                        'tipo_de_identificacion' => $persona->tipo_de_identificacion,
                        'numero_de_identificacion' => $persona->numero_de_identificacion,
                        'entidad' => $persona->entidad,
                        'cargo' => $persona->cargo,
                        'fecha_vinculacion' => $persona->fecha_vinculacion,
                        'fecha_desvinculacion' => $persona->fecha_desvinculacion,
                    ]);
                } else if ($persona->categoria == 2) {
                    array_push($this->listPersonasExpuestasPoliticamenteBF, [
                        'nombre' => $persona->nombre,
                        'grado_de_parentezco' => $persona->grado_de_parentezco,
                        'tipo_de_identificacion' => $persona->tipo_de_identificacion,
                        'numero_de_identificacion' => $persona->numero_de_identificacion,
                        'entidad' => $persona->entidad,
                        'cargo' => $persona->cargo,
                        'fecha_vinculacion' => $persona->fecha_vinculacion,
                        'fecha_desvinculacion' => $persona->fecha_desvinculacion,
                    ]);
                }
            }

            foreach ($this->personaJuridica->beneficiariosFinales as $item) {

                array_push($this->listBeneficiariosFinales, [
                    'bf_razon_social' => $item->razon_social,
                    'bf_tipo_identificacion' => $item->tipo_identificacion,
                    'bf_numero_identificacion' => $item->num_identificacion,
                    'bf_participacion_capital' => $item->porcentaje_participacion,

                ]);
            }

            //Cargar los soportes
            $this->support_clausula_cumplimiento_codigo = $this->personaJuridica->support_clausula_cumplimiento_codigo;
            $this->support_camara_de_comercio = $this->personaJuridica->support_camara_de_comercio;
            $this->support_documento_representante_legal = $this->personaJuridica->support_documento_representante_legal;
            $this->support_certificacion_bancaria = $this->personaJuridica->support_certificacion_bancaria;
            $this->support_rut = $this->personaJuridica->support_rut;
            $this->support_estados_financieros_compartivos = $this->personaJuridica->support_estados_financieros_compartivos;
            $this->support_declaracion_de_renta = $this->personaJuridica->support_declaracion_de_renta;
            $this->support_certificado_implementacion_sg_sst = $this->personaJuridica->support_certificado_implementacion_sg_sst;
            $this->support_certificado_implementacion_bioseguridad = $this->personaJuridica->support_certificado_implementacion_bioseguridad;
            $this->support_certificado_experiencia_contractual = $this->personaJuridica->support_certificado_experiencia_contractual;
            $this->support_certificados_tecnicas_categoria = $this->personaJuridica->support_certificados_tecnicas_categoria;
            $this->support_referencia_comercial = $this->personaJuridica->support_referencia_comercial;
            $this->support_carta_autorizacion_fondos_rl = $this->personaJuridica->support_carta_autorizacion_fondos_rl;
            $this->support_certificacion_de_normativa_riesgos = $this->personaJuridica->support_certificacion_de_normativa_riesgos;
        }
    }

    public function save()
    {
        $this->validate();

        $this->personaJuridica->save();

        //guardar los soportes

        if (!empty($this->support_clausula_cumplimiento_codigo)) {
            $this->personaJuridica->support_clausula_cumplimiento_codigo = $this->support_clausula_cumplimiento_codigo->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_clausula_cumplimiento_codigo/");
        }
        if (!empty($this->support_camara_de_comercio)) {
            $this->personaJuridica->support_camara_de_comercio = $this->support_camara_de_comercio->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_camara_de_comercio/");
        }
        if (!empty($this->support_documento_representante_legal)) {
            $this->personaJuridica->support_documento_representante_legal = $this->support_documento_representante_legal->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_documento_representante_legal/");
        }
        if (!empty($this->support_certificacion_bancaria)) {
            $this->personaJuridica->support_certificacion_bancaria = $this->support_certificacion_bancaria->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_certificacion_bancaria/");
        }
        if (!empty($this->support_rut)) {
            $this->personaJuridica->support_rut = $this->support_rut->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_rut/");
        }
        if (!empty($this->support_estados_financieros_compartivos)) {
            $this->personaJuridica->support_estados_financieros_compartivos = $this->support_estados_financieros_compartivos->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_estados_financieros_compartivos/");
        }
        if (!empty($this->support_declaracion_de_renta)) {
            $this->personaJuridica->support_declaracion_de_renta = $this->support_declaracion_de_renta->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_declaracion_de_renta/");
        }
        if (!empty($this->support_certificado_implementacion_sg_sst)) {
            $this->personaJuridica->support_certificado_implementacion_sg_sst = $this->support_certificado_implementacion_sg_sst->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_certificado_implementacion_sg_sst/");
        }
        if (!empty($this->support_certificado_implementacion_bioseguridad)) {
            $this->personaJuridica->support_certificado_implementacion_bioseguridad = $this->support_certificado_implementacion_bioseguridad->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_certificado_implementacion_bioseguridad/");
        }
        if (!empty($this->support_certificado_experiencia_contractual)) {
            $this->personaJuridica->support_certificado_experiencia_contractual = $this->support_certificado_experiencia_contractual->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_certificado_experiencia_contractual/");
        }
        if (!empty($this->support_certificados_tecnicas_categoria)) {
            $this->personaJuridica->support_certificados_tecnicas_categoria = $this->support_certificados_tecnicas_categoria->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_certificados_tecnicas_categoria/");
        }
        if (!empty($this->support_referencia_comercial)) {
            $this->personaJuridica->support_referencia_comercial = $this->support_referencia_comercial->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_referencia_comercial/");
        }
        if (!empty($this->support_carta_autorizacion_fondos_rl)) {
            $this->personaJuridica->support_carta_autorizacion_fondos_rl = $this->support_carta_autorizacion_fondos_rl->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_carta_autorizacion_fondos_rl/");
        }
        if (!empty($this->support_certificacion_de_normativa_riesgos)) {
            $this->personaJuridica->support_certificacion_de_normativa_riesgos = $this->support_certificacion_de_normativa_riesgos->store("public/form-proveedores/soportes/persona-juridica/" . $this->personaJuridica->id . "/support_certificacion_de_normativa_riesgos/");
        }
        $this->personaJuridica->save();


        //guardar las politicas politicamente expuestas.

        foreach ($this->listPersonasExpuestasPoliticamenteRL as $item) {
            $nueva = new FormPersonasExpuestasPoliticamentePJ();
            $nueva->form_persona_juridica_id = $this->personaJuridica->id;
            $nueva->categoria = 1;
            $nueva->nombre = $item['nombre'];
            $nueva->grado_de_parentezco = $item['grado_de_parentezco'];
            $nueva->tipo_de_identificacion = $item['tipo_de_identificacion'];
            $nueva->numero_de_identificacion = $item['numero_de_identificacion'];
            $nueva->entidad = $item['entidad'];
            $nueva->cargo = $item['cargo'];
            $nueva->fecha_vinculacion = $item['fecha_vinculacion'];
            $nueva->fecha_desvinculacion = $item['fecha_desvinculacion'];
            $nueva->save();
        }

        //guardar las politicas politicamente expuestas.

        foreach ($this->listPersonasExpuestasPoliticamenteBF as $item) {
            $nueva = new FormPersonasExpuestasPoliticamentePJ();
            $nueva->form_persona_juridica_id = $this->personaJuridica->id;
            $nueva->categoria = 2;
            $nueva->nombre = $item['nombre'];
            $nueva->grado_de_parentezco = $item['grado_de_parentezco'];
            $nueva->tipo_de_identificacion = $item['tipo_de_identificacion'];
            $nueva->numero_de_identificacion = $item['numero_de_identificacion'];
            $nueva->entidad = $item['entidad'];
            $nueva->cargo = $item['cargo'];
            $nueva->fecha_vinculacion = $item['fecha_vinculacion'];
            $nueva->fecha_desvinculacion = $item['fecha_desvinculacion'];
            $nueva->save();
        }


        //guardar las politicas politicamente expuestas.

        foreach ($this->listBeneficiariosFinales as $item) {
            $nueva = new FormBeneficiariosFinalesPJ();
            $nueva->form_persona_juridica_id = $this->personaJuridica->id;
            $nueva->razon_social = $item['bf_razon_social'];
            $nueva->tipo_identificacion = $item['bf_tipo_identificacion'];
            $nueva->num_identificacion = $item['bf_numero_identificacion'];
            $nueva->porcentaje_participacion = $item['bf_participacion_capital'];
            $nueva->save();
        }


        return redirect()->route('proveedor.register.finalizado');
    }


    public function addPersonaExpuestaPoliticamenteRL()
    {
        $this->validate([
            'nombreRL' => 'required',
            'grado_de_parentezcoRL' => 'required',
            'tipo_de_identificacionRL' => 'required',
            'numero_de_identificacionRL' => 'required',
            'entidadRL' => 'required',
            'cargoRL' => 'required',
            'fecha_vinculacionRL' => 'required',
            'fecha_desvinculacionRL' => 'required',
        ]);
        array_push($this->listPersonasExpuestasPoliticamenteRL, [
            'nombre' => $this->nombreRL,
            'grado_de_parentezco' => $this->grado_de_parentezcoRL,
            'tipo_de_identificacion' => $this->tipo_de_identificacionRL,
            'numero_de_identificacion' => $this->numero_de_identificacionRL,
            'entidad' => $this->entidadRL,
            'cargo' => $this->cargoRL,
            'fecha_vinculacion' => $this->fecha_vinculacionRL,
            'fecha_desvinculacion' => $this->fecha_desvinculacionRL,
        ]);
        $this->reset([
            'nombreRL',
            'grado_de_parentezcoRL',
            'tipo_de_identificacionRL',
            'numero_de_identificacionRL',
            'entidadRL',
            'cargoRL',
            'fecha_vinculacionRL',
            'fecha_desvinculacionRL',
        ]);
    }

    public function deleteItemListPersonasExpuestasPoliticamenteRL($indexArray)
    {
        unset($this->listPersonasExpuestasPoliticamenteRL[$indexArray]);
    }

    public function addPersonaExpuestaPoliticamenteBF()
    {
        $this->validate([
            'nombreBF' => 'required',
            'grado_de_parentezcoBF' => 'required',
            'tipo_de_identificacionBF' => 'required',
            'numero_de_identificacionBF' => 'required',
            'entidadBF' => 'required',
            'cargoBF' => 'required',
            'fecha_vinculacionBF' => 'required',
            'fecha_desvinculacionBF' => 'required',
        ]);
        array_push($this->listPersonasExpuestasPoliticamenteBF, [
            'nombre' => $this->nombreBF,
            'grado_de_parentezco' => $this->grado_de_parentezcoBF,
            'tipo_de_identificacion' => $this->tipo_de_identificacionBF,
            'numero_de_identificacion' => $this->numero_de_identificacionBF,
            'entidad' => $this->entidadBF,
            'cargo' => $this->cargoBF,
            'fecha_vinculacion' => $this->fecha_vinculacionBF,
            'fecha_desvinculacion' => $this->fecha_desvinculacionBF,
        ]);
        $this->reset([
            'nombreBF',
            'grado_de_parentezcoBF',
            'tipo_de_identificacionBF',
            'numero_de_identificacionBF',
            'entidadBF',
            'cargoBF',
            'fecha_vinculacionBF',
            'fecha_desvinculacionBF',
        ]);
    }

    public function deleteItemListPersonasExpuestasPoliticamenteBF($indexArray)
    {
        unset($this->listPersonasExpuestasPoliticamenteBF[$indexArray]);
    }

    public function addListBeneficiariosFinales()
    {
        $this->validate([
            'bf_razon_social' => 'required',
            'bf_tipo_identificacion' => 'required',
            'bf_numero_identificacion' => 'required',
            'bf_participacion_capital' => 'required',
        ]);
        array_push($this->listBeneficiariosFinales, [
            'bf_razon_social' => $this->bf_razon_social,
            'bf_tipo_identificacion' => $this->bf_tipo_identificacion,
            'bf_numero_identificacion' => $this->bf_numero_identificacion,
            'bf_participacion_capital' => $this->bf_participacion_capital,
        ]);
        $this->reset([
            'bf_razon_social',
            'bf_tipo_identificacion',
            'bf_numero_identificacion',
            'bf_participacion_capital',
        ]);
    }

    public function deleteListBeneficiariosFinales($indexArray)
    {
        unset($this->listBeneficiariosFinales[$indexArray]);
    }
}
