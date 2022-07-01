<?php

namespace Database\Seeders;

use App\Models\Jobtitle;
use Illuminate\Database\Seeder;

class JobtitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $GERENTE = Jobtitle::create(['name' => 'Gerente', 'id_boss' => 1, 'level' => 1]);
        $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO = Jobtitle::create(['name' => 'Director Administrativo y Financiero', 'id_boss' => $GERENTE->id, 'level' => 1]);
        $JEFE_DE_SISTEMAS = Jobtitle::create(['name' => 'Jefe de Sistemas', 'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id, 'level' => 2]);
        $ANALISTA_DE_DESARROLLO = Jobtitle::create(['name' => 'Analista de Desarrollo', 'id_boss' => $JEFE_DE_SISTEMAS->id, 'level' => 3]);

        //SE CREA UN NO APLICA
        /* $NO_APLICA = Jobtitle::create(['name' => 'NO APLICA']);

        //GERENCIA
        $GERENTE = Jobtitle::create(['name' => 'GERENTE',  'id_boss' => $NO_APLICA->id]);
         $SECRETARIA_DE_GERENCIA = Jobtitle::create(['name' => 'SECRETARIA DE GERENCIA',  'id_boss' => $NO_APLICA->id]);

        
        //CARGOS QUE NO SE ENCONTRAROS
        $JEFE_DE_OPERACION_Y_MANTENIMIENTO = Jobtitle::create(['name' => 'JEFE DE OPERACION Y MANTENIMIENTO',  'id_boss' => $GERENTE->id]);
        $JEFE_DE_CONSTRUCCION_Y_REPARACION = Jobtitle::create(['name' => 'JEFE DE CONSTRUCCION Y REPARACION',  'id_boss' => $GERENTE->id]);
        $COORDINADOR_COMERCIAL = Jobtitle::create(['name' => 'COORDINADOR COMERCIAL',  'id_boss' => $GERENTE->id]);
        $ADMINISTRADOR_CENTRO_OPERATIVO = Jobtitle::create(['name' => 'ADMINISTRADOR CENTRO OPERATIVO',  'id_boss' => $GERENTE->id]);
        $ADMINISTRADOR_CENTRO_OPERATIVO_GUANENTA = Jobtitle::create(['name' => 'ADMINISTRADOR CENTRO OPERATIVO GUANENTA',  'id_boss' => $GERENTE->id]);
        $ADMINISTRADOR_CENTRO_OPERATIVO_OCANA = Jobtitle::create(['name' => 'ADMINISTRADOR CENTRO OPERATIVO OCANA',  'id_boss' => $GERENTE->id]);
        $COORDINADOR_CONSTRUCCIONES_Y_REDES = Jobtitle::create(['name' => 'COORDINADOR CONSTRUCCIONES Y REDES',  'id_boss' => $GERENTE->id]);
        $PROFESIONAL_CARTOGRAFO= Jobtitle::create(['name' => 'COORDINADOR CONSTRUCCIONES Y REDES',  'id_boss' => $GERENTE->id]);

        
        //DIRECTORES
        $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO = Jobtitle::create(['name' => 'DIRECTOR ADMINISTRATIVO Y FINANCIERO',  'id_boss' => $GERENTE->id]);
        $DIRECTOR_COMERCIAL = Jobtitle::create(['name' => 'DIRECTOR COMERCIAL',  'id_boss' => $GERENTE->id]);
        $DIRECTOR_CONTROL_INTERNO = Jobtitle::create(['name' => 'DIRECTOR CONTROL INTERNO',  'id_boss' => $GERENTE->id]);
        $DIRECTOR_TECNICO = Jobtitle::create(['name' => 'DIRECTOR TECNICO',  'id_boss' => $GERENTE->id]);
        $DIRECTOR_DE_PLANEACION = Jobtitle::create(['name' => 'DIRECTORA DE PLANEACION',  'id_boss' => $GERENTE->id]);

        //SUBDIRECTORES
        $SUB_DIRECTOR_DE_OPERACIONES_Y_GESTION_DE_ACTIVOS = Jobtitle::create(['name' => 'SUB-DIRECTOR DE OPERACIONES Y GESTION DE ACTIVOS',  'id_boss' => $DIRECTOR_TECNICO->id]);

        $ADMINISTRADOR_CENTRO_OPERATVO = Jobtitle::create(['name' => 'ADMINISTRADOR CENTRO OPERATVO',  'id_boss' => $GERENTE->id]);

        $AUDITOR_INTERNO = Jobtitle::create(['name' => 'AUDITOR INTERNO',  'id_boss' => $NO_APLICA->id]);

        //JEFES
        $JEFE_DE_SISTEMAS = Jobtitle::create(['name' => 'JEFE DE SISTEMAS',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $JEFE_DE_VENTAS = Jobtitle::create(['name' => 'JEFE DE VENTAS',  'id_boss' => $DIRECTOR_COMERCIAL->id]);
        $JEFE_BALANCE_DE_GAS_Y_PERDIDAS = Jobtitle::create(['name' => 'JEFE BALANCE DE GAS Y PERDIDAS',  'id_boss' => $DIRECTOR_TECNICO->id]);
        $JEFE_DE_ALMACEN = Jobtitle::create(['name' => 'JEFE DE ALMACEN',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $JEFE_DE_CARTERA = Jobtitle::create(['name' => 'JEFE DE CARTERA',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $JEFE_DE_COMUNICACIONES = Jobtitle::create(['name' => 'JEFE DE COMUNICACIONES',  'id_boss' => $DIRECTOR_COMERCIAL->id]);
        $JEFE_DE_CONSTRUCCIONES_Y_REPARACIONES = Jobtitle::create(['name' => 'JEFE DE CONSTRUCCIONES Y REPARACIONES',  'id_boss' => $DIRECTOR_TECNICO->id]);
        $JEFE_DE_CONTROL_ADMINISTRATIVO_Y_FINANCIERO = Jobtitle::create(['name' => 'JEFE DE CONTROL ADMINISTRATIVO Y FINANCIERO',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $JEFE_DE_CONTROL_PRESUPUESTAL_Y_CONTRATACION = Jobtitle::create(['name' => 'JEFE DE CONTROL PRESUPUESTAL Y CONTRATACIÓN',  'id_boss' => $GERENTE->id]);
        $JEFE_DE_FACTURACION = Jobtitle::create(['name' => 'JEFE DE FACTURACION',  'id_boss' => $DIRECTOR_COMERCIAL->id]);
        $JEFE_DE_HSEQ = Jobtitle::create(['name' => 'JEFE DE HSEQ',  'id_boss' => $GERENTE->id]);
        $JEFE_DE_INVESTIGACION_Y_PERDIDA = Jobtitle::create(['name' => 'JEFE DE INVESTIGACION Y PERDIDA',  'id_boss' => $DIRECTOR_TECNICO->id]);
        $JEFE_DE_PLANEACION = Jobtitle::create(['name' => 'JEFE DE PLANEACION',  'id_boss' => $DIRECTOR_DE_PLANEACION->id]);
        $JEFE_DE_SERVICIO_AL_CLIENTE = Jobtitle::create(['name' => 'JEFE DE SERVICIO AL CLIENTE',  'id_boss' => $DIRECTOR_COMERCIAL->id]);
        $JEFE_DE_TALENTO_HUMANO = Jobtitle::create(['name' => 'JEFE DE TALENTO HUMANO',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $JEFE_FINANCIERO_Y_CONTABLE = Jobtitle::create(['name' => 'JEFE FINANCIERO Y CONTABLE',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $JEFE_JURIDICO = Jobtitle::create(['name' => 'JEFE JURIDICO',  'id_boss' => $GERENTE->id]);
        $JEFE_TECNICO_AGENCIA = Jobtitle::create(['name' => 'JEFE TECNICO AGENCIA',  'id_boss' => $DIRECTOR_TECNICO->id]);
        $JEFE_TECNICO_DE_AGENCIA = Jobtitle::create(['name' => 'JEFE TECNICO DE AGENCIA',  'id_boss' => $DIRECTOR_TECNICO->id]);

        //CORDINADORES
        $COORDINADOR_DE_CARTOGRAFIA = Jobtitle::create(['name' => 'COORDINADOR DE CARTOGRAFIA',  'id_boss' => $JEFE_DE_SISTEMAS->id]);
        $COORDINADOR_DE_COMERCIOS = Jobtitle::create(['name' => 'COORDINADOR DE COMERCIOS',  'id_boss' => $JEFE_DE_VENTAS->id]);
        $COORDINADOR_DE_DESARROLLO = Jobtitle::create(['name' => 'COORDINADOR DE DESARROLLO',  'id_boss' => $JEFE_DE_SISTEMAS->id]);
        $COORDINADOR_DE_EMERGENCIAS = Jobtitle::create(['name' => 'COORDINADOR DE EMERGENCIAS',  'id_boss' => $JEFE_DE_OPERACION_Y_MANTENIMIENTO->id]);
        $COORDINADOR_DE_FACTURACION = Jobtitle::create(['name' => 'COORDINADOR DE FACTURACION',  'id_boss' => $JEFE_DE_FACTURACION->id]);
        $COORDINADOR_DE_INSTALACIONES_1 = Jobtitle::create(['name' => 'COORDINADOR DE INSTALACIONES',  'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id]);
        $COORDINADOR_DE_INSTALACIONES_2 = Jobtitle::create(['name' => 'COORDINADOR DE INSTALACIONES',  'id_boss' => $JEFE_DE_CONSTRUCCION_Y_REPARACION->id]);
        $COORDINADOR_DE_METROLOGIA = Jobtitle::create(['name' => 'COORDINADOR DE METROLOGIA',  'id_boss' => $JEFE_DE_OPERACION_Y_MANTENIMIENTO->id]);
        $COORDINADOR_DE_REDES = Jobtitle::create(['name' => 'COORDINADOR DE REDES',  'id_boss' => $JEFE_DE_SISTEMAS->id]);
        $COORDINADOR_DE_REPARACIONES_1 = Jobtitle::create(['name' => 'COORDINADOR DE REPARACIONES',  'id_boss' => $JEFE_DE_CONSTRUCCION_Y_REPARACION->id]);
        $COORDINADOR_DE_REPARACIONES_2 = Jobtitle::create(['name' => 'COORDINADOR DE REPARACIONES',  'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id]);
        $COORDINADOR_DE_SERVICIOS_Y_REPARACIONES = Jobtitle::create(['name' => 'COORDINADOR DE SERVICIOS Y REPARACIONES',  'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id]);
        $COORDINADOR_GESTION_DOCUMENTAL = Jobtitle::create(['name' => 'COORDINADOR GESTION DOCUMENTAL',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $COORDINADOR_TELEMETRIA_Y_GNC = Jobtitle::create(['name' => 'COORDINADOR TELEMETRIA Y GNC',  'id_boss' => $JEFE_DE_OPERACION_Y_MANTENIMIENTO->id]);
        $COORDINADOR_VENTAS_RESIDENCIALES = Jobtitle::create(['name' => 'COORDINADOR VENTAS RESIDENCIALES',  'id_boss' => $JEFE_DE_VENTAS->id]);
        $COORDINADOR_CONTABLE = Jobtitle::create(['name' => 'COORDINADORA CONTABLE',  'id_boss' => $JEFE_FINANCIERO_Y_CONTABLE->id]);
        $COORDINADORA_DE_COMPRAS = Jobtitle::create(['name' => 'COORDINADORA DE COMPRAS',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $COORDINADOR_TALENTO_HUMANO = Jobtitle::create(['name' => 'COORDINADORA TALENTO HUMANO',  'id_boss' => $JEFE_DE_TALENTO_HUMANO->id]);

        $LIDER_DE_HSEQ = Jobtitle::create(['name' => 'LIDER DE HSEQ',  'id_boss' => $JEFE_DE_HSEQ->id]);
        $LIDER_DE_OPERACION_Y_MANTENIMIENTO = Jobtitle::create(['name' => 'LIDER DE OPERACIÓN Y MANTENIMIENTO',  'id_boss' => $JEFE_DE_OPERACION_Y_MANTENIMIENTO->id]);
        $PROFESIONAL_CARTOGRAFICO = Jobtitle::create(['name' => 'PROFESIONAL CARTOGRAFICO',  'id_boss' => $COORDINADOR_DE_CARTOGRAFIA->id]);
        $PROFESIONAL_DE_CONTROL_INTERNO = Jobtitle::create(['name' => 'PROFESIONAL DE CONTROL INTERNO',  'id_boss' => $DIRECTOR_CONTROL_INTERNO->id]);
        $TESORERO = Jobtitle::create(['name' => 'TESORERO',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $ANALISTA_CONTABLE = Jobtitle::create(['name' => 'ANALISTA CONTABLE',  'id_boss' => $JEFE_FINANCIERO_Y_CONTABLE->id]);
        $ANALISTA_DE_CARTERA = Jobtitle::create(['name' => 'ANALISTA DE CARTERA',  'id_boss' => $JEFE_DE_CARTERA->id]);
        $ANALISTA_DE_COMPRAS = Jobtitle::create(['name' => 'ANALISTA DE COMPRAS',  'id_boss' => $COORDINADORA_DE_COMPRAS->id]);
        $ANALISTA_DE_CONTABILIDAD = Jobtitle::create(['name' => 'ANALISTA DE CONTABILIDAD',  'id_boss' => $JEFE_FINANCIERO_Y_CONTABLE->id]);
        $ANALISTA_DE_FACTURACION = Jobtitle::create(['name' => 'ANALISTA DE FACTURACION',  'id_boss' => $COORDINADOR_DE_FACTURACION->id]);
        $ANALISTA_DE_PLANEACION = Jobtitle::create(['name' => 'ANALISTA DE PLANEACION',  'id_boss' => $DIRECTOR_DE_PLANEACION->id]);
        $ANALISTA_DE_SISTEMAS = Jobtitle::create(['name' => 'ANALISTA DE SISTEMAS',  'id_boss' => $JEFE_DE_SISTEMAS->id]);
        $ANALISTA_DE_DESARROLLO= Jobtitle::create(['name' => 'ANALISTA DE DESARROLLO',  'id_boss' => $JEFE_DE_SISTEMAS->id]);
        $ANALISTA_DE_TALENTO_HUMANO = Jobtitle::create(['name' => 'ANALISTA DE TALENTO HUMANO',  'id_boss' => $JEFE_DE_TALENTO_HUMANO->id]);
        $ANALISTA_JURIDICO = Jobtitle::create(['name' => 'ANALISTA JURIDICO',  'id_boss' => $JEFE_JURIDICO->id]);
        $ANALISTA_RPQ = Jobtitle::create(['name' => 'ANALISTA RPQ',  'id_boss' => $JEFE_DE_CONSTRUCCION_Y_REPARACION->id]);
        $ASESOR_COMERCIAL_VENTAS_RESIDENCIALES = Jobtitle::create(['name' => 'ASESOR COMERCIAL',  'id_boss' => $COORDINADOR_VENTAS_RESIDENCIALES->id]);
        $ASESOR_COMERCIAL_COMERCIAL = Jobtitle::create(['name' => 'ASESOR COMERCIAL',  'id_boss' => $COORDINADOR_COMERCIAL->id]);
        $ASISTENTE_DE_HSEQ = Jobtitle::create(['name' => 'ASISTENTE DE HSEQ',  'id_boss' => $JEFE_DE_HSEQ->id]);
        $ASISTENTE_DE_TESORERIA = Jobtitle::create(['name' => 'ASISTENTE DE TESORERIA',  'id_boss' => $TESORERO->id]);
        $AUXILIAR_ADMINISTRATIVO_1 = Jobtitle::create(['name' => 'AUXILIAR ADMINISTRATIVO',  'id_boss' => $JEFE_DE_INVESTIGACION_Y_PERDIDA->id]);
        $AUXILIAR_ADMINISTRATIVO_2 = Jobtitle::create(['name' => 'AUXILIAR ADMINISTRATIVO',  'id_boss' => $JEFE_DE_CONSTRUCCION_Y_REPARACION->id]);
        $AUXILIAR_ADMINISTRATIVO_3 = Jobtitle::create(['name' => 'AUXILIAR ADMINISTRATIVO',  'id_boss' => $ADMINISTRADOR_CENTRO_OPERATIVO->id]);
        $AUXILIAR_ADMINISTRATIVO_4 = Jobtitle::create(['name' => 'AUXILIAR ADMINISTRATIVO',  'id_boss' => $ADMINISTRADOR_CENTRO_OPERATIVO_GUANENTA->id]);
        $AUXILIAR_ADMINISTRATIVO_5 = Jobtitle::create(['name' => 'AUXILIAR ADMINISTRATIVO',  'id_boss' => $DIRECTOR_ADMINISTRATIVO_Y_FINANCIERO->id]);
        $AUXILIAR_ADMINISTRATIVO_6 = Jobtitle::create(['name' => 'AUXILIAR ADMINISTRATIVO',  'id_boss' => $ADMINISTRADOR_CENTRO_OPERATIVO_OCANA->id]);
        $AUXILIAR_CONTACT_CENTER = Jobtitle::create(['name' => 'AUXILIAR CONTACT CENTER',  'id_boss' => $JEFE_DE_SERVICIO_AL_CLIENTE->id]);
        $AUXILIAR_DE_ALMACEN = Jobtitle::create(['name' => 'AUXILIAR DE ALMACEN',  'id_boss' => $JEFE_DE_ALMACEN->id]);
        $AUXILIAR_DE_CONTABILIDAD = Jobtitle::create(['name' => 'AUXILIAR DE CONTABILIDAD',  'id_boss' => $JEFE_FINANCIERO_Y_CONTABLE->id]);
        $AUXILIAR_DE_FACTURACION = Jobtitle::create(['name' => 'AUXILIAR DE FACTURACION',  'id_boss' => $COORDINADOR_DE_FACTURACION->id]);
        $AUXILIAR_DE_GESTION_DOCUMENTAL = Jobtitle::create(['name' => 'AUXILIAR DE GESTION DOCUMENTAL',  'id_boss' => $COORDINADOR_GESTION_DOCUMENTAL->id]);
        $AUXILIAR_DE_INVESTIGACION_Y_PERDIDAS_1 = Jobtitle::create(['name' => 'AUXILIAR DE INVESTIGACION Y PERDIDAS',  'id_boss' => $JEFE_DE_INVESTIGACION_Y_PERDIDA->id]);
        $AUXILIAR_DE_INVESTIGACION_Y_PERDIDAS_2 = Jobtitle::create(['name' => 'AUXILIAR DE INVESTIGACION Y PERDIDAS',  'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id]);
        $AUXILIAR_DE_MANTENIMIENTO_1 = Jobtitle::create(['name' => 'AUXILIAR DE MANTENIMIENTO',  'id_boss' => $COORDINADOR_DE_METROLOGIA->id]);
        $AUXILIAR_DE_MANTENIMIENTO_2 = Jobtitle::create(['name' => 'AUXILIAR DE MANTENIMIENTO',  'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id]);
        $AUXILIAR_DE_SERVICIO_AL_CLIENTE_Y_RECAUDO = Jobtitle::create(['name' => 'AUXILIAR DE SERVICIO AL CLIENTE Y RECAUDO',  'id_boss' => $JEFE_DE_SERVICIO_AL_CLIENTE->id]);
        $AUXILIAR_DE_SISTEMAS = Jobtitle::create(['name' => 'AUXILIAR DE SISTEMAS',  'id_boss' => $JEFE_DE_SISTEMAS->id]);
        $AUXILIAR_DE_TALENTO_HUMANO = Jobtitle::create(['name' => 'AUXILIAR DE TALENTO HUMANO',  'id_boss' => $JEFE_DE_TALENTO_HUMANO->id]);
        $AUXILIAR_DE_TESORERIA = Jobtitle::create(['name' => 'AUXILIAR DE TESORERIA',  'id_boss' => $TESORERO->id]);
        $AUXILIAR_SERVICIO_AL_CLIENTE = Jobtitle::create(['name' => 'AUXILIAR SERVICIO AL CLIENTE',  'id_boss' => $JEFE_DE_SERVICIO_AL_CLIENTE->id]);


        $GESTOR_CARTERA = Jobtitle::create(['name' => 'GESTOR CARTERA',  'id_boss' => $JEFE_DE_CARTERA->id]);

        //OPERADOR GNC
        $OPERADOR_GNC = Jobtitle::create(['name' => 'OPERADOR GNC',  'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id]);

        $PROGRAMADOR_DE_MANTENIMIENTO = Jobtitle::create(['name' => 'PROGRAMADOR DE MANTENIMIENTO',  'id_boss' => $JEFE_DE_OPERACION_Y_MANTENIMIENTO->id]);
        $SUPERNUMERARIO = Jobtitle::create(['name' => 'SUPERNUMERARIO',  'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id]);
        $SUPERVISOR_CENTROS_POBLADOS_RIO_DE_ORO = Jobtitle::create(['name' => 'SUPERVISOR CENTROS POBLADOS RIO DE ORO',  'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id]);
        $SUPERVISOR_HSEQ = Jobtitle::create(['name' => 'SUPERVISOR HSEQ',  'id_boss' => $JEFE_DE_HSEQ->id]);

        //TECNICOS
        $TECNICO_CARTOGRAFICO = Jobtitle::create(['name' => 'TECNICO CARTOGRAFICO',  'id_boss' => $PROFESIONAL_CARTOGRAFO->id]);
        $TECNICO_DE_EMERGENCIAS = Jobtitle::create(['name' => 'TECNICO DE EMERGENCIAS',  'id_boss' => $COORDINADOR_DE_EMERGENCIAS->id]);
        $TECNICO_DE_REDES = Jobtitle::create(['name' => 'TECNICO DE REDES',  'id_boss' => $COORDINADOR_CONSTRUCCIONES_Y_REDES->id]);
        $TECNICO_INSTALADOR = Jobtitle::create(['name' => 'TECNICO INSTALADOR',  'id_boss' => $COORDINADOR_DE_INSTALACIONES_2->id]);


        //APRENDIZ SENA
        $APRENDIZ_SENA = Jobtitle::create(['name' => 'APRENDIZ SENA',  'id_boss' => $NO_APLICA->id]);

        //MENSAJERO
        $MENSAJERO = Jobtitle::create(['name' => 'MENSAJERO',  'id_boss' => $NO_APLICA->id]);


        //CARGOS QUE NO SE ENCONTRAROS
        $APRENDIZ_SENA_SISTEMAS = Jobtitle::create(['name' => 'APRENDIZ SENA SISTEMAS',  'id_boss' => $JEFE_DE_SISTEMAS->id]);
        $APRENDIZ_SENA_HSEQ = Jobtitle::create(['name' => 'APRENDIZ SENA HSEQ',  'id_boss' => $JEFE_DE_HSEQ->id]);  */
    }
}
