<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_persona_naturals', function (Blueprint $table) {
            $table->id();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->tinyInteger('genero')->nullable();
            $table->tinyInteger('tipo_identificacion')->nullable();
            $table->string('num_identificacion')->nullable();
            $table->string('lugar_expedicion')->nullable();
            $table->string('fecha_expedicion')->nullable();
            $table->tinyInteger('estado_civil')->nullable();
            $table->string('nivel_educativo')->nullable();
            $table->string('personas_a_cargo')->nullable();
            $table->integer('num_personas_a_cargo')->nullable();
            $table->string('tipo_vivieda')->nullable();
            $table->string('zona_de_ubicacion')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('ciudad_nacimiento')->nullable();
            $table->string('departamento_nacimiento')->nullable();
            $table->string('direccion_domicilio')->nullable();
            $table->string('ciudad_domicilio')->nullable();
            $table->string('departamento_domicilio')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('codigo_actividad_CIIU_principal')->nullable();
            $table->string('detalle_actividad_economica')->nullable();

            $table->tinyInteger('gran_contribuyente')->nullable();
            $table->tinyInteger('autorretenedor')->nullable();
            $table->tinyInteger('responsable_iva')->nullable();
            $table->tinyInteger('maneja_dinero_o_publicamente_expuesto')->nullable();

            $table->string('nombre_empresa')->nullable();
            $table->tinyInteger('tipo_empresa')->nullable();
            $table->string('cargo_empresa')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('ciudad_empresa')->nullable();
            $table->string('barrio_empresa')->nullable();
            $table->string('telefono_empresa')->nullable();

            $table->string('nombre_contacto')->nullable();
            $table->string('cargo_contacto')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('email_contacto')->nullable();

            $table->tinyInteger('administra_recursos_publicos')->nullable();
            $table->tinyInteger('persona_expuesta_politicamente_extranjera')->nullable();
            $table->tinyInteger('persona_expuesta_politicamente_orga_internacionales')->nullable();
            $table->tinyInteger('tiene_relacionados_cercanos_expuestos_politicamente')->nullable();


            $table->string('total_ingresos_mensuales')->nullable();
            $table->string('total_egresos_mensuales')->nullable();
            $table->string('otros_ingresos_mensuales')->nullable();
            $table->string('otros_egresos_mensuales')->nullable();
            $table->string('total_activos')->nullable();
            $table->string('total_pasivos')->nullable();
            $table->string('es_declarante_de_renta')->nullable();

            $table->tinyInteger('oi_realizar_opera_internacionales')->nullable();
            $table->tinyInteger('oi_posee_cuentas_en_moneda_extranjera')->nullable();
            $table->string('oi_nombre_entidad_financiera')->nullable();
            $table->string('oi_ciudad_o_pais')->nullable();
            $table->string('oi_monto_promedio_mesual')->nullable();
            $table->string('oi_moneda')->nullable();
            $table->tinyInteger('oi_importaciones')->nullable();
            $table->tinyInteger('oi_exportaciones')->nullable();
            $table->tinyInteger('oi_inversiones')->nullable();
            $table->tinyInteger('oi_prestamos_m_e')->nullable();

            $table->tinyInteger('fe_factura_electronicamente')->nullable();
            $table->string('fe_desde_cuando')->nullable();



            $table->string('do_declaro_que_el_origen')->nullable();
            $table->string('do_declaro_provienen_de')->nullable();
            $table->string('do_declaro_recursos_recibidos')->nullable();

            $table->string('ref_p_nombre')->nullable();
            $table->string('ref_p_direccion')->nullable();
            $table->string('ref_p_telefono')->nullable();
            $table->string('ref_p_parentesco')->nullable();
            $table->string('ref_p_ciudad')->nullable();

            $table->string('ref_f_nombre')->nullable();
            $table->string('ref_f_direccion')->nullable();
            $table->string('ref_f_telefono')->nullable();
            $table->string('ref_f_parentesco')->nullable();
            $table->string('ref_f_ciudad')->nullable();

            $table->string('support_formato_viculacion_persona_natural')->nullable();
            $table->string('support_clausula_cumplimiento_codigo_etica')->nullable();
            $table->string('support_cedula_ciudadania')->nullable();
            $table->string('support_cedula_extranjeria')->nullable();
            $table->string('support_rut')->nullable();
            $table->string('support_camara_de_comercio')->nullable();
            $table->string('support_declaracion_de_renta_o_certificacion_no_declarante')->nullable();
            $table->string('support_certificacion_bancaria')->nullable();
            $table->string('support_certificado_experiencia_u_hoja_de_vida')->nullable();
            $table->string('support_certificado_profesional')->nullable();
            $table->string('support_referencias_comerciales')->nullable();
            $table->string('support_afiliacion_seguridad_social')->nullable();

            $table->string('terminos_y_condiciones')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_persona_naturals');
    }
};
