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
        Schema::create('form_persona_juridicas', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social')->nullable();
            $table->string('nit')->nullable();
            $table->string('digito_verificador')->nullable();

            $table->string('sigla')->nullable();
            $table->string('direccion_principal')->nullable();
            $table->string('tipo_empresa')->nullable();
            $table->string('pagina_web')->nullable();
            $table->string('correo_electronico_notificacion')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono_fijo')->nullable();
          

            $table->string('gran_contribuyente')->nullable();
            $table->string('autorretenedor')->nullable();
            $table->string('responsable_iva')->nullable();
            $table->string('rst')->nullable();
            $table->string('codigo_ciiu_actividad_principal')->nullable();
            $table->string('descripcion_actividad__ciiu')->nullable();
          

            $table->string('esta_obligada')->nullable();
            $table->string('tiene_implementado_un_sistema_de_administracion_de_riesgo_de_lavado_de_activos')->nullable();
           


            $table->string('rl_nombre')->nullable();
            $table->string('rl_apellido')->nullable();
            $table->string('rl_tipo_documento')->nullable();
            $table->string('rl_num_docuemnto')->nullable();
            $table->string('rl_fecha_expedicion')->nullable();
            $table->string('rl_ciudad_expedicion')->nullable();
            $table->string('rl_administra_recursos_publicos_o_es_pep')->nullable();
            $table->string('rl_persona_expuesta_pliticamente_extrajera')->nullable();
            $table->string('rl_persona_expuesta_politicamente_de_organizaciones_internacionales')->nullable();
            $table->string('rl_tiene_relecionados_cercanos_expuestos_politicamente')->nullable();
           

            $table->string('bf_administra_recursos_publicos_o_es_pep')->nullable();
            $table->string('bf_persona_expuesta_pliticamente_extrajera')->nullable();
            $table->string('bf_persona_expuesta_politicamente_de_organizaciones_internacionales')->nullable();
            $table->string('bf_tiene_relecionados_cercanos_expuestos_politicamente')->nullable();
          

            $table->string('if_total_ingresos')->nullable();
            $table->string('if_total_egresos')->nullable();
            $table->string('if_otros_ingresos')->nullable();
            $table->string('if_otros_egresos')->nullable();
            $table->string('if_total_activos')->nullable();
            $table->string('if_total_pasivos')->nullable();
            $table->string('if_mes_corte_informacion_financiera')->nullable();
            $table->string('if_ano_corte_informacion_financiera')->nullable();
            $table->string('if_declarante_de_renta')->nullable();
            $table->string('oi_realiza_op_internacionales')->nullable();
            $table->string('oi_posee_cuentas_en_moneda_extranjera')->nullable();
            $table->string('oi_nombre_de_entidad_financiera')->nullable();
            $table->string('oi_ciudad')->nullable();
            $table->string('oi_pais')->nullable();
            $table->string('oi_monto_promedio_mensual')->nullable();
            $table->string('oi_moneda')->nullable();
            $table->string('oi_importaciones')->nullable();
            $table->string('oi_exportaciones')->nullable();
            $table->string('oi_inversiones')->nullable();
            $table->string('oi_prestamos_m_e')->nullable();
           

            $table->string('fe_factura_electronica')->nullable();
            $table->string('fe_fecha_desde_que_factura')->nullable();
            $table->string('fe_envio_nombre')->nullable();
            $table->string('fe_envio_cargo')->nullable();
            $table->string('fe_envio_correo_electronico')->nullable();
            $table->string('fe_recepcion_nombre')->nullable();
            $table->string('fe_recepcion_cargo')->nullable();
            $table->string('fe_recepcion_correo_electronico')->nullable();
           
            $table->string('do_declaro_origen_de_fondos')->nullable();
            $table->string('do_declaro_que_posee_la_entidad')->nullable();
            $table->string('do_declaro_que_los_recursos_recibidos_por_las')->nullable();
          
            $table->string('rc_nombre_del_establecimiento')->nullable();
            $table->string('rc_nombre_del_contacto')->nullable();
            $table->string('rc_direccion')->nullable();
            $table->string('rc_ciudad')->nullable();
            $table->string('rc_telefono')->nullable();
          

            $table->string('cer_asi_las_cosas')->nullable();
            $table->string('cer_entidad')->nullable();
            $table->string('cer_obligada_laftpadm')->nullable();
            $table->string('cer_cumple_nomrmas')->nullable();
            $table->string('cer_cuenta_con_adecuadas_pliticas')->nullable();
            $table->string('cer_ha_estado_involucrada')->nullable();
            $table->string('cer_ha_sido_sancionada')->nullable();
            $table->string('cer_nombres')->nullable();
            $table->string('cer_apellidos')->nullable();
            $table->string('cer_telefono')->nullable();
            $table->string('cer_correo_electronico')->nullable();
            $table->string('cer_direccion')->nullable();

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
        Schema::dropIfExists('form_persona_juridicas');
    }
};
