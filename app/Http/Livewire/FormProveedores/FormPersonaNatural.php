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
use App\Models\TypeIdentification;
use Livewire\Component;

class FormPersonaNatural extends Component
{

    public ModelsFormPersonaNatural $personaNatural;

    protected $rules = [
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
        'personaNatural.persona_expuesta_politicamente_extranjera' => 'required',
        'personaNatural.persona_expuesta_politicamente_orga_internacionales' => 'required',
        'personaNatural.tiene_relacionados_cercanos_expuestos_politicamente' => 'required',


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
        'personaNatural.do_declaro_recursos_recibidos' => 'required',

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

    ];

    public function mount()
    {
        $this->personaNatural = new ModelsFormPersonaNatural();
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
    }
}
