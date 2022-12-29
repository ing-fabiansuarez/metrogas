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
use App\Models\Empresa;
use App\Models\FormPersonaNatural as ModelsFormPersonaNatural;
use App\Models\FormPersonasExpuestasPoliticamentePN;
use App\Models\TypeIdentification;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormPersonaNatural extends Component
{
    use WithFileUploads;

    public ModelsFormPersonaNatural $personaNatural;
    public $solo_lectura;

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
        'personaNatural.empresa_id' => 'required',
        'personaNatural.nombres' => 'required',
        'personaNatural.apellidos' => 'required',
        'personaNatural.genero' => 'required',
        'personaNatural.tipo_identificacion' => 'required',
        'personaNatural.num_identificacion' => 'required',
        'personaNatural.lugar_expedicion' => 'required',
        'personaNatural.fecha_expedicion' => 'required',
        'personaNatural.estado_civil' => 'required',
        'personaNatural.nivel_educativo' => 'required',
        'personaNatural.personas_a_cargo' => 'required',
        'personaNatural.num_personas_a_cargo' => 'required',
        'personaNatural.tipo_vivieda' => 'required',
        'personaNatural.zona_de_ubicacion' => 'required',
        'personaNatural.fecha_nacimiento' => 'required',
        'personaNatural.ciudad_nacimiento' => 'required',
        'personaNatural.departamento_nacimiento' => 'required',
        'personaNatural.direccion_domicilio' => 'required',
        'personaNatural.ciudad_domicilio' => 'required',
        'personaNatural.departamento_domicilio' => 'required',
        'personaNatural.correo_electronico' => 'required',
        'personaNatural.celular' => 'required',
        'personaNatural.telefono' => 'required',
        'personaNatural.ocupacion' => 'required',
        'personaNatural.codigo_actividad_CIIU_principal' => 'required',
        'personaNatural.detalle_actividad_economica' => 'required',

        'personaNatural.gran_contribuyente' => 'required',
        'personaNatural.autorretenedor' => 'required',
        'personaNatural.responsable_iva' => 'required',
        'personaNatural.maneja_dinero_o_publicamente_expuesto' => 'required',

        'personaNatural.nombre_empresa' => 'required',
        'personaNatural.tipo_empresa' => 'required',
        'personaNatural.cargo_empresa' => 'required',
        'personaNatural.direccion_empresa' => 'required',
        'personaNatural.ciudad_empresa' => 'required',
        'personaNatural.barrio_empresa' => 'required',
        'personaNatural.telefono_empresa' => 'required',

        'personaNatural.nombre_contacto' => 'required',
        'personaNatural.cargo_contacto' => 'required',
        'personaNatural.telefono_contacto' => 'required',
        'personaNatural.email_contacto' => 'required',

        'personaNatural.administra_recursos_publicos' => 'required',
        'personaNatural.persona_expuesta_politicamente_extranjera' =>
            'required',
        'personaNatural.persona_expuesta_politicamente_orga_internacionales' =>
            'required',
        'personaNatural.tiene_relacionados_cercanos_expuestos_politicamente' =>
            'required',

        'personaNatural.total_ingresos_mensuales' => 'required',
        'personaNatural.total_egresos_mensuales' => 'required',
        'personaNatural.otros_ingresos_mensuales' => 'required',
        'personaNatural.otros_egresos_mensuales' => 'required',
        'personaNatural.total_activos' => 'required',
        'personaNatural.total_pasivos' => 'required',
        'personaNatural.es_declarante_de_renta' => 'required',

        'personaNatural.oi_realizar_opera_internacionales' => 'required',
        'personaNatural.oi_posee_cuentas_en_moneda_extranjera' => 'required',
        'personaNatural.oi_nombre_entidad_financiera' => 'required',
        'personaNatural.oi_ciudad_o_pais' => 'required',
        'personaNatural.oi_monto_promedio_mesual' => 'required',
        'personaNatural.oi_moneda' => 'required',
        'personaNatural.oi_importaciones' => 'required',
        'personaNatural.oi_exportaciones' => 'required',
        'personaNatural.oi_inversiones' => 'required',
        'personaNatural.oi_prestamos_m_e' => 'required',

        'personaNatural.fe_factura_electronicamente' => 'required',
        'personaNatural.fe_desde_cuando' => 'required',

        'personaNatural.do_declaro_que_el_origen' => 'required',
        'personaNatural.do_declaro_provienen_de' => 'required',
        'personaNatural.do_declaro_recursos_recibidos' => '',

        'personaNatural.ref_p_nombre' => 'required',
        'personaNatural.ref_p_direccion' => 'required',
        'personaNatural.ref_p_telefono' => 'required',
        'personaNatural.ref_p_parentesco' => 'required',
        'personaNatural.ref_p_ciudad' => 'required',

        'personaNatural.ref_f_nombre' => 'required',
        'personaNatural.ref_f_direccion' => 'required',
        'personaNatural.ref_f_telefono' => 'required',
        'personaNatural.ref_f_parentesco' => 'required',
        'personaNatural.ref_f_ciudad' => 'required',

        'personaNatural.terminos_y_condiciones' => 'required',

        'support_formato_viculacion_persona_natural' => '',
        'support_clausula_cumplimiento_codigo_etica' => '',
        'support_cedula_ciudadania' => 'required',
        'support_cedula_extranjeria' => 'required',
        'support_rut' => 'required',
        'support_camara_de_comercio' => '',
        'support_declaracion_de_renta_o_certificacion_no_declarante' => '',
        'support_certificacion_bancaria' => 'required',
        'support_certificado_experiencia_u_hoja_de_vida' => 'required',
        'support_certificado_profesional' => '',
        'support_referencias_comerciales' => '',
        'support_afiliacion_seguridad_social' => '',
    ];

    protected $listeners = [
        'addPersonaExpuestaPoliticamente',
        'deleteItemListPersonasExpuestasPoliticamente',
    ];

    public function mount(
        $solo_lectura = false,
        ModelsFormPersonaNatural $personaNatural = new ModelsFormPersonaNatural()
    ) {
        $this->personaNatural = $personaNatural;
        $this->listPersonasExpuestasPoliticamente = [];
        $this->solo_lectura = $solo_lectura;
        if ($this->personaNatural != null) {
            foreach (
                $this->personaNatural->personasPoliticamenteExpuestas
                as $persona
            ) {
                array_push($this->listPersonasExpuestasPoliticamente, [
                    'nombre' => $persona->nombre,
                    'grado_de_parentezco' => $persona->grado_de_parentezco,
                    'tipo_de_identificacion' =>
                        $persona->tipo_de_identificacion,
                    'numero_de_identificacion' =>
                        $persona->numero_de_identificacion,
                    'entidad' => $persona->entidad,
                    'cargo' => $persona->cargo,
                    'fecha_vinculacion' => $persona->fecha_vinculacion,
                    'fecha_desvinculacion' => $persona->fecha_desvinculacion,
                ]);
            }

            $this->support_formato_viculacion_persona_natural =
                $this->personaNatural->support_formato_viculacion_persona_natural;
            $this->support_clausula_cumplimiento_codigo_etica =
                $this->personaNatural->support_clausula_cumplimiento_codigo_etica;
            $this->support_cedula_ciudadania =
                $this->personaNatural->support_cedula_ciudadania;
            $this->support_cedula_extranjeria =
                $this->personaNatural->support_cedula_extranjeria;
            $this->support_rut = $this->personaNatural->support_rut;
            $this->support_camara_de_comercio =
                $this->personaNatural->support_camara_de_comercio;
            $this->support_declaracion_de_renta_o_certificacion_no_declarante =
                $this->personaNatural->support_declaracion_de_renta_o_certificacion_no_declarante;
            $this->support_certificacion_bancaria =
                $this->personaNatural->support_certificacion_bancaria;
            $this->support_certificado_experiencia_u_hoja_de_vida =
                $this->personaNatural->support_certificado_experiencia_u_hoja_de_vida;
            $this->support_certificado_profesional =
                $this->personaNatural->support_certificado_profesional;
            $this->support_referencias_comerciales =
                $this->personaNatural->support_referencias_comerciales;
            $this->support_afiliacion_seguridad_social =
                $this->personaNatural->support_afiliacion_seguridad_social;
        }
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
            'empresas' => Empresa::all(),
        ]);
    }

    public function save()
    {
        $this->validate();

        $this->personaNatural->save();

        //urls soportes
        if (!empty($this->support_formato_viculacion_persona_natural)) {
            $this->personaNatural->support_formato_viculacion_persona_natural = $this->support_formato_viculacion_persona_natural->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_formato_viculacion_persona_natural/'
            );
        }
        if (!empty($this->support_clausula_cumplimiento_codigo_etica)) {
            $this->personaNatural->support_clausula_cumplimiento_codigo_etica = $this->support_clausula_cumplimiento_codigo_etica->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_clausula_cumplimiento_codigo_etica/'
            );
        }
        if (!empty($this->support_cedula_ciudadania)) {
            $this->personaNatural->support_cedula_ciudadania = $this->support_cedula_ciudadania->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_cedula_ciudadania/'
            );
        }
        if (!empty($this->support_cedula_extranjeria)) {
            $this->personaNatural->support_cedula_extranjeria = $this->support_cedula_extranjeria->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_cedula_extranjeria/'
            );
        }
        if (!empty($this->support_rut)) {
            $this->personaNatural->support_rut = $this->support_rut->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_rut/'
            );
        }
        if (!empty($this->support_camara_de_comercio)) {
            $this->personaNatural->support_camara_de_comercio = $this->support_camara_de_comercio->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_camara_de_comercio/'
            );
        }
        if (
            !empty(
                $this->support_declaracion_de_renta_o_certificacion_no_declarante
            )
        ) {
            $this->personaNatural->support_declaracion_de_renta_o_certificacion_no_declarante = $this->support_declaracion_de_renta_o_certificacion_no_declarante->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_declaracion_de_renta_o_certificacion_no_declarante/'
            );
        }
        if (!empty($this->support_certificacion_bancaria)) {
            $this->personaNatural->support_certificacion_bancaria = $this->support_certificacion_bancaria->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_certificacion_bancaria/'
            );
        }
        if (!empty($this->support_certificado_experiencia_u_hoja_de_vida)) {
            $this->personaNatural->support_certificado_experiencia_u_hoja_de_vida = $this->support_certificado_experiencia_u_hoja_de_vida->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_certificado_experiencia_u_hoja_de_vida/'
            );
        }
        if (!empty($this->support_certificado_profesional)) {
            $this->personaNatural->support_certificado_profesional = $this->support_certificado_profesional->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_certificado_profesional/'
            );
        }
        if (!empty($this->support_referencias_comerciales)) {
            $this->personaNatural->support_referencias_comerciales = $this->support_referencias_comerciales->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_referencias_comerciales/'
            );
        }
        if (!empty($this->support_afiliacion_seguridad_social)) {
            $this->personaNatural->support_afiliacion_seguridad_social = $this->support_afiliacion_seguridad_social->store(
                'public/form-proveedores/soportes/persona-natural/' .
                    $this->personaNatural->id .
                    '/support_afiliacion_seguridad_social/'
            );
        }

        $this->personaNatural->save();

        //guardar las politicas politicamente expuestas.

        foreach ($this->listPersonasExpuestasPoliticamente as $item) {
            $nueva = new FormPersonasExpuestasPoliticamentePN();
            $nueva->form_persona_natural_id = $this->personaNatural->id;
            $nueva->nombre = $item['nombre'];
            $nueva->grado_de_parentezco = $item['grado_de_parentezco'];
            $nueva->tipo_de_identificacion = $item['tipo_de_identificacion'];
            $nueva->numero_de_identificacion =
                $item['numero_de_identificacion'];
            $nueva->entidad = $item['entidad'];
            $nueva->cargo = $item['cargo'];
            $nueva->fecha_vinculacion = $item['fecha_vinculacion'];
            $nueva->fecha_desvinculacion = $item['fecha_desvinculacion'];
            $nueva->save();
        }

        return redirect()->route('proveedor.register.finalizado');
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
