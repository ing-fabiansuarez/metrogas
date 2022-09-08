<?php

namespace App\Http\Livewire\FormProveedores;

use App\Enums\EEstadoCivil;
use App\Enums\EGenero;
use App\Enums\ENivelEducativo;
use App\Enums\ESiNo;
use App\Enums\ETipoEmpresa;
use App\Enums\ETipoOcupacion;
use App\Enums\ETipoVivienda;
use App\Enums\EZonaUbicacion;
use App\Models\FormPersonaNatural as ModelsFormPersonaNatural;
use App\Models\FormPersonasExpuestasPoliticamentePN;
use App\Models\TypeIdentification;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormPersonaNatural extends Component
{

    use WithFileUploads;

    public ModelsFormPersonaNatural $personaNatural;

    //SOPORTES
    public $support_formato_viculacion_persona_natural;
    public $support_clausula_cumplimiento_codigo_etica;
    public $support_cedula_ciudadania;
    public $support_cedula_extranjeria;
    public $support_rut;
    public $support_camara_de_comercio;
    public $support_declaracion_de_renta_o_certificacion_no_declarante;
    public $support_certificacion_bancaria;
    public $support_certificado_experiencia_u_hoja_de_vida;
    public $support_certificado_profesional;
    public $support_referencias_comerciales;
    public $support_afiliacion_seguridad_social;

    //LISTADO PERSONAS POLITICAMENTE EXPUESTAS
    public $listPersonasExpuestasPoliticamente;
    public $nombre;
    public $grado_de_parentezco;
    public $tipo_de_identificacion;
    public $numero_de_identificacion;
    public $entidad;
    public $cargo;
    public $fecha_vinculacion;
    public $fecha_desvinculacion;


    protected $rules = [
        'personaNatural.nombres' => '',
        'personaNatural.apellidos' => '',
        'personaNatural.genero' => '',
        'personaNatural.tipo_identificacion' => '',
        'personaNatural.num_identificacion' => '',
        'personaNatural.lugar_expedicion' => '',
        'personaNatural.fecha_expedicion' => '',
        'personaNatural.estado_civil' => '',
        'personaNatural.nivel_educativo' => '',
        'personaNatural.personas_a_cargo' => '',
        'personaNatural.num_personas_a_cargo' => '',
        'personaNatural.tipo_vivieda' => '',
        'personaNatural.zona_de_ubicacion' => '',
        'personaNatural.fecha_nacimiento' => '',
        'personaNatural.ciudad_nacimiento' => '',
        'personaNatural.departamento_nacimiento' => '',
        'personaNatural.direccion_domicilio' => '',
        'personaNatural.ciudad_domicilio' => '',
        'personaNatural.departamento_domicilio' => '',
        'personaNatural.correo_electronico' => '',
        'personaNatural.celular' => '',
        'personaNatural.telefono' => '',
        'personaNatural.ocupacion' => '',
        'personaNatural.codigo_actividad_CIIU_principal' => '',
        'personaNatural.detalle_actividad_economica' => '',

        'personaNatural.gran_contribuyente' => '',
        'personaNatural.autorretenedor' => '',
        'personaNatural.responsable_iva' => '',
        'personaNatural.maneja_dinero_o_publicamente_expuesto' => '',

        'personaNatural.nombre_empresa' => '',
        'personaNatural.tipo_empresa' => '',
        'personaNatural.cargo_empresa' => '',
        'personaNatural.direccion_empresa' => '',
        'personaNatural.ciudad_empresa' => '',
        'personaNatural.barrio_empresa' => '',
        'personaNatural.telefono_empresa' => '',

        'personaNatural.nombre_contacto' => '',
        'personaNatural.cargo_contacto' => '',
        'personaNatural.telefono_contacto' => '',
        'personaNatural.email_contacto' => '',

        'personaNatural.administra_recursos_publicos' => '',
        'personaNatural.persona_expuesta_politicamente_extranjera' => '',
        'personaNatural.persona_expuesta_politicamente_orga_internacionales' => '',
        'personaNatural.tiene_relacionados_cercanos_expuestos_politicamente' => '',


        'personaNatural.total_ingresos_mensuales' => '',
        'personaNatural.total_egresos_mensuales' => '',
        'personaNatural.otros_ingresos_mensuales' => '',
        'personaNatural.otros_egresos_mensuales' => '',
        'personaNatural.total_activos' => '',
        'personaNatural.total_pasivos' => '',
        'personaNatural.es_declarante_de_renta' => '',


        'personaNatural.oi_realizar_opera_internacionales' => '',
        'personaNatural.oi_posee_cuentas_en_moneda_extranjera' => '',
        'personaNatural.oi_nombre_entidad_financiera' => '',
        'personaNatural.oi_ciudad_o_pais' => '',
        'personaNatural.oi_monto_promedio_mesual' => '',
        'personaNatural.oi_moneda' => '',
        'personaNatural.oi_importaciones' => '',
        'personaNatural.oi_exportaciones' => '',
        'personaNatural.oi_inversiones' => '',
        'personaNatural.oi_prestamos_m_e' => '',

        'personaNatural.fe_factura_electronicamente' => '',
        'personaNatural.fe_desde_cuando' => '',

        'personaNatural.do_declaro_que_el_origen' => '',
        'personaNatural.do_declaro_provienen_de' => '',
        'personaNatural.do_declaro_recursos_recibidos' => '',

        'personaNatural.ref_p_nombre' => '',
        'personaNatural.ref_p_direccion' => '',
        'personaNatural.ref_p_telefono' => '',
        'personaNatural.ref_p_parentesco' => '',
        'personaNatural.ref_p_ciudad' => '',

        'personaNatural.ref_f_nombre' => '',
        'personaNatural.ref_f_direccion' => '',
        'personaNatural.ref_f_telefono' => '',
        'personaNatural.ref_f_parentesco' => '',
        'personaNatural.ref_f_ciudad' => '',

        'personaNatural.terminos_y_condiciones' => '',


        'support_formato_viculacion_persona_natural' => '',
        'support_clausula_cumplimiento_codigo_etica' => '',
        'support_cedula_ciudadania' => '',
        'support_cedula_extranjeria' => '',
        'support_rut' => '',
        'support_camara_de_comercio' => '',
        'support_declaracion_de_renta_o_certificacion_no_declarante' => '',
        'support_certificacion_bancaria' => '',
        'support_certificado_experiencia_u_hoja_de_vida' => '',
        'support_certificado_profesional' => '',
        'support_referencias_comerciales' => '',
        'support_afiliacion_seguridad_social' => '',

    ];

    protected $listeners = [
        'addPersonaExpuestaPoliticamente',
        'deleteItemListPersonasExpuestasPoliticamente'
    ];

    public function mount()
    {
        $this->personaNatural = new ModelsFormPersonaNatural();
        $this->listPersonasExpuestasPoliticamente = [];
    }

    public function render()
    {
        return view('livewire.form-proveedores.form-persona-natural', [
            'generos' => EGenero::cases(),
            'tipoIdentificaciones' => TypeIdentification::all(),
            'estadosciviles' => EEstadoCivil::cases(),
            'niveleseducacion' => ENivelEducativo::cases(),
            'Esino' => ESiNo::cases(),
            'tiposvivienda' => ETipoVivienda::cases(),
            'ZonasUbicacion' => EZonaUbicacion::cases(),
            'tiposocupaciones' => ETipoOcupacion::cases(),
            'tiposempresa' => ETipoEmpresa::cases(),
        ]);
    }

    public function save()
    {
        $this->validate();

        $this->personaNatural->save();

        //urls soportes
        if (!empty($this->support_formato_viculacion_persona_natural)) {
            $this->personaNatural->support_formato_viculacion_persona_natural = $this->support_formato_viculacion_persona_natural->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_formato_viculacion_persona_natural/");
        }
        if (!empty($this->support_clausula_cumplimiento_codigo_etica)) {
            $this->personaNatural->support_clausula_cumplimiento_codigo_etica = $this->support_clausula_cumplimiento_codigo_etica->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_clausula_cumplimiento_codigo_etica/");
        }
        if (!empty($this->support_cedula_ciudadania)) {
            $this->personaNatural->support_cedula_ciudadania = $this->support_cedula_ciudadania->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_cedula_ciudadania/");
        }
        if (!empty($this->support_cedula_extranjeria)) {
            $this->personaNatural->support_cedula_extranjeria = $this->support_cedula_extranjeria->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_cedula_extranjeria/");
        }
        if (!empty($this->support_rut)) {
            $this->personaNatural->support_rut = $this->support_rut->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_rut/");
        }
        if (!empty($this->support_camara_de_comercio)) {
            $this->personaNatural->support_camara_de_comercio = $this->support_camara_de_comercio->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_camara_de_comercio/");
        }
        if (!empty($this->support_declaracion_de_renta_o_certificacion_no_declarante)) {
            $this->personaNatural->support_declaracion_de_renta_o_certificacion_no_declarante = $this->support_declaracion_de_renta_o_certificacion_no_declarante->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_declaracion_de_renta_o_certificacion_no_declarante/");
        }
        if (!empty($this->support_certificacion_bancaria)) {
            $this->personaNatural->support_certificacion_bancaria = $this->support_certificacion_bancaria->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_certificacion_bancaria/");
        }
        if (!empty($this->support_certificado_experiencia_u_hoja_de_vida)) {
            $this->personaNatural->support_certificado_experiencia_u_hoja_de_vida = $this->support_certificado_experiencia_u_hoja_de_vida->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_certificado_experiencia_u_hoja_de_vida/");
        }
        if (!empty($this->support_certificado_profesional)) {
            $this->personaNatural->support_certificado_profesional = $this->support_certificado_profesional->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_certificado_profesional/");
        }
        if (!empty($this->support_referencias_comerciales)) {
            $this->personaNatural->support_referencias_comerciales = $this->support_referencias_comerciales->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_referencias_comerciales/");
        }
        if (!empty($this->support_afiliacion_seguridad_social)) {
            $this->personaNatural->support_afiliacion_seguridad_social = $this->support_afiliacion_seguridad_social->store("public/form-proveedores/soportes/" . $this->personaNatural->id . "/support_afiliacion_seguridad_social/");
        }

        $this->personaNatural->save();

        //guardar las politicas politicamente expuestas.

        foreach ($this->listPersonasExpuestasPoliticamente as $item) {
            $nueva = new FormPersonasExpuestasPoliticamentePN();
            $nueva->form_persona_natural_id=$this->personaNatural->id;
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
    }


    public function addPersonaExpuestaPoliticamente()
    {
        $this->validate([
            'nombre' => 'required',
            'grado_de_parentezco' => 'required',
            'tipo_de_identificacion' => 'required',
            'numero_de_identificacion' => 'required',
            'entidad' => 'required',
            'cargo' => 'required',
            'fecha_vinculacion' => 'required',
            'fecha_desvinculacion' => 'required',
        ]);
        array_push($this->listPersonasExpuestasPoliticamente, [
            'nombre' => $this->nombre,
            'grado_de_parentezco' => $this->grado_de_parentezco,
            'tipo_de_identificacion' => $this->tipo_de_identificacion,
            'numero_de_identificacion' => $this->numero_de_identificacion,
            'entidad' => $this->entidad,
            'cargo' => $this->cargo,
            'fecha_vinculacion' => $this->fecha_vinculacion,
            'fecha_desvinculacion' => $this->fecha_desvinculacion,
        ]);
        $this->reset([
            'nombre',
            'grado_de_parentezco',
            'tipo_de_identificacion',
            'numero_de_identificacion',
            'entidad',
            'cargo',
            'fecha_vinculacion',
            'fecha_desvinculacion',
        ]);
    }

    public function deleteItemListPersonasExpuestasPoliticamente($indexArray)
    {
        unset($this->listPersonasExpuestasPoliticamente[$indexArray]);
    }
}
