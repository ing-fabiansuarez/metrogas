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
            $table->string('nombres');
            $table->string('apellidos');
            $table->tinyInteger('genero');
            $table->tinyInteger('tipo_identificacion');
            $table->string('num_identificacion');
            $table->string('lugar_expedicion');
            $table->string('fecha_expedicion');
            $table->tinyInteger('estado_civil');
            $table->string('nivel_educativo');
            $table->string('personas_a_cargo');
            $table->integer('num_personas_a_cargo');
            $table->string('tipo_vivieda');
            $table->string('zona_de_ubicacion');
            $table->string('fecha_nacimiento');
            $table->string('ciudad_nacimiento');
            $table->string('departamento_nacimiento');
            $table->string('direccion_domicilio');
            $table->string('ciudad_domicilio');
            $table->string('departamento_domicilio');
            $table->string('correo_electronico');
            $table->string('celular');
            $table->string('telefono');
            $table->string('ocupacion');
            $table->string('codigo_actividad_CIIU_principal');
            $table->string('detalle_actividad_economica');

            $table->tinyInteger('gran_contribuyente');
            $table->tinyInteger('autorretenedor');
            $table->tinyInteger('responsable_iva');
            $table->tinyInteger('maneja_dinero_o_publicamente_expuesto');

            $table->string('nombre_empresa');
            $table->tinyInteger('tipo_empresa');
            $table->string('cargo_empresa');
            $table->string('direccion_empresa');
            $table->string('ciudad_empresa');
            $table->string('barrio_empresa');
            $table->string('telefono_empresa');

            $table->string('nombre_contacto');
            $table->string('cargo_contacto');
            $table->string('telefono_contacto');
            $table->string('email_contacto');

            $table->tinyInteger('administra_recursos_publicos');
            $table->tinyInteger('persona_expuesta_politicamente_extranjera');
            $table->tinyInteger('persona_expuesta_politicamente_orga_internacionales');
            $table->tinyInteger('tiene_relacionados_cercanos_expuestos_politicamente');


            $table->string('total_ingresos_mensuales');
            $table->string('total_egresos_mensuales');
            $table->string('otros_ingresos_mensuales');
            $table->string('otros_egresos_mensuales');
            $table->string('total_activos');
            $table->string('total_pasivos');
            $table->string('es_declarante_de_renta');

            $table->tinyInteger('oi_realizar_opera_internacionales');
            $table->tinyInteger('oi_posee_cuentas_en_moneda_extranjera');
            $table->string('oi_nombre_entidad_financiera');
            $table->string('oi_ciudad_o_pais');
            $table->string('oi_monto_promedio_mesual');
            $table->string('oi_moneda');
            $table->tinyInteger('oi_importaciones');
            $table->tinyInteger('oi_exportaciones');
            $table->tinyInteger('oi_inversiones');
            $table->tinyInteger('oi_prestamos_m_e');

            $table->tinyInteger('fe_factura_electronicamente');
            $table->string('fe_desde_cuando');



            $table->string('do_declaro_que_el_origen');
            $table->string('do_declaro_provienen_de');
            $table->string('do_declaro_recursos_recibidos');

            $table->string('ref_p_nombre');
            $table->string('ref_p_direccion');
            $table->string('ref_p_telefono');
            $table->string('ref_p_parentesco');
            $table->string('ref_p_ciudad');

            $table->string('ref_f_nombre');
            $table->string('ref_f_direccion');
            $table->string('ref_f_telefono');
            $table->string('ref_f_parentesco');
            $table->string('ref_f_ciudad');

            $table->string('terminos_y_condiciones');

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
