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
        $NO_DEFINIDO = Jobtitle::create(['name' => 'N/D (No Definido)', 'id_boss' => null, 'level' => 1]);
        $NO_DEFINIDO->id_boss = $NO_DEFINIDO->id;
        $NO_DEFINIDO->save();
        $NO_APLICA = Jobtitle::create(['name' => 'N/A (No Aplica)', 'id_boss' => null, 'level' => 1]);
        $NO_APLICA->id_boss = $NO_APLICA->id;
        $NO_APLICA->save();
        $GERENTE = Jobtitle::create(['name' => 'Gerente', 'id_boss' => null, 'level' => 1]);
        $GERENTE->id_boss = $GERENTE->id;
        $GERENTE->save();

        $Director_Administrativo_y_Financiero = Jobtitle::create(['name' => 'Director Administrativo y Financiero', 'id_boss' => $GERENTE->id, 'level' => 1]);
        $Director_Comercial = Jobtitle::create(['name' => 'Director Comercial', 'id_boss' => $GERENTE->id, 'level' => 1]);
        $Director_Control_Tecnico = Jobtitle::create(['name' => 'Director Control Tecnico', 'id_boss' => $GERENTE->id, 'level' => 1]);
        $Director_Tecnico = Jobtitle::create(['name' => 'Director Tecnico', 'id_boss' => $GERENTE->id, 'level' => 1]);
        $Directora_Administrativa_y_Financiera = Jobtitle::create(['name' => 'Directora Administrativa y Financiera', 'id_boss' => $GERENTE->id, 'level' => 1]);
        $Directora_de_Control_Interno = Jobtitle::create(['name' => 'Directora de Control Interno', 'id_boss' => $GERENTE->id, 'level' => 1]);
        $Directora_Planeacion = Jobtitle::create(['name' => 'Directora Planeacion', 'id_boss' => $GERENTE->id, 'level' => 1]);
        $TESORERO = Jobtitle::create(['name' => 'TESORERO', 'id_boss' => $NO_DEFINIDO->id, 'level' => 1]);
        $Coordinadora_Cartografia = Jobtitle::create(['name' => 'Coordinadora Cartografia', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $Profesional_cartografico = Jobtitle::create(['name' => 'Profesional cartografico', 'id_boss' => $Coordinadora_Cartografia->id, 'level' => 2]);
        $Coordinador_Gestion_Documental = Jobtitle::create(['name' => 'Coordinador Gestion Documental', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);
        $Coordinadora_de_Compras = Jobtitle::create(['name' => 'Coordinadora de Compras', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);
        $Jefe_Cartera = Jobtitle::create(['name' => 'Jefe Cartera', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);
        $Jefe_de_Almacen = Jobtitle::create(['name' => 'Jefe de Almacen', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);
        $Jefe_de_Sistemas = Jobtitle::create(['name' => 'Jefe de Sistemas', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);
        $Jefe_de_Talento_Humano = Jobtitle::create(['name' => 'Jefe de Talento Humano', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);
        $Jefe_financiero_y_contable = Jobtitle::create(['name' => 'Jefe financiero y contable', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);
        $Tesorero = Jobtitle::create(['name' => 'Tesorero', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);
        $JEFE_DE_COMUNICACIONES = Jobtitle::create(['name' => 'JEFE DE COMUNICACIONES', 'id_boss' => $Director_Comercial->id, 'level' => 2]);
        $Jefe_de_Facturacion = Jobtitle::create(['name' => 'Jefe de Facturacion', 'id_boss' => $Director_Comercial->id, 'level' => 2]);
        $Jefe_de_Servicio_al_cliente = Jobtitle::create(['name' => 'Jefe de Servicio al cliente', 'id_boss' => $Director_Comercial->id, 'level' => 2]);
        $Jefe_de_ventas = Jobtitle::create(['name' => 'Jefe de ventas', 'id_boss' => $Director_Comercial->id, 'level' => 2]);
        $Jefe_de_construcciones_y_reparaciones = Jobtitle::create(['name' => 'Jefe de construcciones y reparaciones', 'id_boss' => $Director_Tecnico->id, 'level' => 2]);
        $Administrador_centro_operativo = Jobtitle::create(['name' => 'Administrador centro operativo', 'id_boss' => $GERENTE->id, 'level' => 2]);
        $Administrador_Centro_San_Gil = Jobtitle::create(['name' => 'Administrador Centro San Gil', 'id_boss' => $GERENTE->id, 'level' => 2]);
        $Administradora_Centro = Jobtitle::create(['name' => 'Administradora Centro', 'id_boss' => $GERENTE->id, 'level' => 2]);
        $Jefe_de_hseq = Jobtitle::create(['name' => 'Jefe de hseq', 'id_boss' => $GERENTE->id, 'level' => 2]);
        $Jefe_Juridico = Jobtitle::create(['name' => 'Jefe Juridico', 'id_boss' => $GERENTE->id, 'level' => 2]);
        $JEFE_TECNICO_DE_AGENCIA = Jobtitle::create(['name' => 'JEFE_TECNICO_DE_AGENCIA', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $Jefe_Facturacion = Jobtitle::create(['name' => 'Jefe_Facturacion', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $coordinador_de_ventas_residenciales = Jobtitle::create(['name' => 'coordinador de ventas residenciales', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $Jefe_de_Operacion_y_Mantenimiento = Jobtitle::create(['name' => 'Jefe de Operacion y Mantenimiento', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $Jefe_Reperaciones_y_Construcciones = Jobtitle::create(['name' => 'Jefe Reperaciones y Construcciones', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $Jefe_Talento_Humano = Jobtitle::create(['name' => 'Jefe Talento Humano', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $coordinador_de_reparaciones = Jobtitle::create(['name' => 'coordinador de reparaciones', 'id_boss' => $Jefe_Reperaciones_y_Construcciones->id, 'level' => 2]);
        $Coordinador_de_Facturacion = Jobtitle::create(['name' => 'Coordinador de Facturacion', 'id_boss' => $Jefe_Facturacion->id, 'level' => 2]);
        $Coordinador_de_Emergencias = Jobtitle::create(['name' => 'Coordinador de Emergencias', 'id_boss' => $Jefe_de_Operacion_y_Mantenimiento->id, 'level' => 2]);
        $Coordinador_de_Metrologia = Jobtitle::create(['name' => 'Coordinador de Metrologia', 'id_boss' => $Jefe_de_Operacion_y_Mantenimiento->id, 'level' => 2]);
        $Coordinador_de_desarrollo = Jobtitle::create(['name' => 'Coordinador de desarrollo', 'id_boss' => $Jefe_de_Sistemas->id, 'level' => 2]);
        $Coordinadora_Talento_Humano = Jobtitle::create(['name' => 'Coordinadora Talento Humano', 'id_boss' => $Jefe_Talento_Humano->id, 'level' => 2]);
        $Coordinador_de_Instalaciones = Jobtitle::create(['name' => 'Coordinador de Instalaciones', 'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id, 'level' => 2]);
        $Coordinador_de_Servicios_y_Reparaciones = Jobtitle::create(['name' => 'Coordinador de Servicios y Reparaciones', 'id_boss' => $JEFE_TECNICO_DE_AGENCIA->id, 'level' => 2]);
        $Jefe_HSEQ = Jobtitle::create(['name' => 'Jefe HSEQ', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $Jefe_de_Investigacion_y_Perdidas = Jobtitle::create(['name' => 'Jefe de Investigacion y Perdidas', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $Jefe_Contable_y_Financiero = Jobtitle::create(['name' => 'Jefe Contable y Financiero', 'id_boss' => $NO_DEFINIDO->id, 'level' => 2]);
        $Tecnico_de_Emergencias = Jobtitle::create(['name' => 'Tecnico de Emergencias', 'id_boss' => $Coordinador_de_Emergencias->id, 'level' => 3]);
        $Analista_de_Facturacion = Jobtitle::create(['name' => 'Analista de Facturacion', 'id_boss' => $Coordinador_de_Facturacion->id, 'level' => 3]);
        $Auxiliar_de_Facturacion = Jobtitle::create(['name' => 'Auxiliar de Facturacion', 'id_boss' => $Coordinador_de_Facturacion->id, 'level' => 3]);
        $Tecnico_Instalador = Jobtitle::create(['name' => 'Tecnico Instalador', 'id_boss' => $Coordinador_de_Instalaciones->id, 'level' => 3]);
        $Auxiliar_de_Mantenimiento = Jobtitle::create(['name' => 'Auxiliar de Mantenimiento', 'id_boss' => $Coordinador_de_Metrologia->id, 'level' => 3]);
        $Aux_gestion_documental = Jobtitle::create(['name' => 'Aux gestion documental', 'id_boss' => $Coordinador_Gestion_Documental->id, 'level' => 3]);
        $Asesor_Comercial = Jobtitle::create(['name' => 'Asesor Comercial', 'id_boss' => $coordinador_de_ventas_residenciales->id, 'level' => 3]);
        $Asesor_Comerical = Jobtitle::create(['name' => 'Asesor Comerical', 'id_boss' => $coordinador_de_ventas_residenciales->id, 'level' => 3]);
        $Asesora_Comercial = Jobtitle::create(['name' => 'Asesora Comercial', 'id_boss' => $coordinador_de_ventas_residenciales->id, 'level' => 3]);
        $Analista_de_compras = Jobtitle::create(['name' => 'Analista de compras', 'id_boss' => $Coordinadora_de_Compras->id, 'level' => 3]);
        $Analista_de_Planeacion = Jobtitle::create(['name' => 'Analista de Planeacion', 'id_boss' => $Directora_Planeacion->id, 'level' => 3]);
        $Auxiliar_de_Almacen = Jobtitle::create(['name' => 'Auxiliar de Almacen', 'id_boss' => $Jefe_de_Almacen->id, 'level' => 3]);
        $Gestor_Cartera = Jobtitle::create(['name' => 'Gestor Cartera', 'id_boss' => $Jefe_Cartera->id, 'level' => 3]);
        $Gestor_de_Cartera = Jobtitle::create(['name' => 'Gestor de Cartera', 'id_boss' => $Jefe_Cartera->id, 'level' => 3]);
        $Gestora_de_Cartera = Jobtitle::create(['name' => 'Gestora de Cartera', 'id_boss' => $Jefe_Cartera->id, 'level' => 3]);
        $Asistente_HSEQ = Jobtitle::create(['name' => 'Asistente HSEQ', 'id_boss' => $Jefe_HSEQ->id, 'level' => 3]);
        $Coordinador_HSEQ = Jobtitle::create(['name' => 'Coordinador HSEQ', 'id_boss' => $Jefe_HSEQ->id, 'level' => 3]);
        $Supervisor_HSEQ = Jobtitle::create(['name' => 'Supervisor HSEQ', 'id_boss' => $Jefe_HSEQ->id, 'level' => 3]);
        $Auxiliar_Administrativo = Jobtitle::create(['name' => 'Auxiliar Administrativo', 'id_boss' => $Jefe_de_Investigacion_y_Perdidas->id, 'level' => 3]);
        $Auxiliar_de_Investigacion_y_Perdidas = Jobtitle::create(['name' => 'Auxiliar de Investigacion y Perdidas', 'id_boss' => $Jefe_de_Investigacion_y_Perdidas->id, 'level' => 3]);
        $Programador_de_Mantenimiento = Jobtitle::create(['name' => 'Programador de Mantenimiento', 'id_boss' => $Jefe_de_Operacion_y_Mantenimiento->id, 'level' => 3]);
        $Aux_Servicio_al_cliente = Jobtitle::create(['name' => 'Aux. Servicio al cliente', 'id_boss' => $Jefe_de_Servicio_al_cliente->id, 'level' => 3]);
        $Auxiliar_Contact_Center = Jobtitle::create(['name' => 'Auxiliar Contact Center', 'id_boss' => $Jefe_de_Servicio_al_cliente->id, 'level' => 3]);
        $Auxiliar_de_Servicio_al_Cliente = Jobtitle::create(['name' => 'Auxiliar de Servicio al Cliente', 'id_boss' => $Jefe_de_Servicio_al_cliente->id, 'level' => 3]);
        $Auxiliar_de_Servicio_al_Cliente_y_Recaudo = Jobtitle::create(['name' => 'Auxiliar de Servicio al Cliente y Recaudo', 'id_boss' => $Jefe_de_Servicio_al_cliente->id, 'level' => 3]);
        $Auxiliar_Servicio_al_Cliente = Jobtitle::create(['name' => 'Auxiliar Servicio al Cliente', 'id_boss' => $Jefe_de_Servicio_al_cliente->id, 'level' => 3]);
        $Analista_de_Desarrollo = Jobtitle::create(['name' => 'Analista de Desarrollo', 'id_boss' => $Jefe_de_Sistemas->id, 'level' => 3]);
        $Analista_de_Sistemas = Jobtitle::create(['name' => 'Analista de Sistemas', 'id_boss' => $Jefe_de_Sistemas->id, 'level' => 3]);
        $Auxiliar_de_Sistemas = Jobtitle::create(['name' => 'Auxiliar de Sistemas', 'id_boss' => $Jefe_de_Sistemas->id, 'level' => 3]);
        $Auxiliar_Sistemas = Jobtitle::create(['name' => 'Auxiliar Sistemas', 'id_boss' => $Jefe_de_Sistemas->id, 'level' => 3]);
        $ANALISTA_DE_TALENTO_HUMANO = Jobtitle::create(['name' => 'ANALISTA DE TALENTO HUMANO', 'id_boss' => $Jefe_Talento_Humano->id, 'level' => 3]);
        $Coordinadora_TH = Jobtitle::create(['name' => 'Coordinadora TH', 'id_boss' => $Jefe_Talento_Humano->id, 'level' => 3]);
        $Analista_Contable = Jobtitle::create(['name' => 'Analista Contable', 'id_boss' => $Jefe_Contable_y_Financiero->id, 'level' => 3]);
        $Analista_juridico = Jobtitle::create(['name' => 'Analista juridico', 'id_boss' => $Jefe_Juridico->id, 'level' => 3]);
        $Secretaria_de_Gerencia = Jobtitle::create(['name' => 'Secretaria de Gerencia', 'id_boss' => $GERENTE->id, 'level' => 3]);
        $Asistente_Tesorero = Jobtitle::create(['name' => 'Asistente Tesorero', 'id_boss' => $TESORERO->id, 'level' => 3]);
        $Auxiliar_de_Tesoreria = Jobtitle::create(['name' => 'Auxiliar de Tesoreria', 'id_boss' => $TESORERO->id, 'level' => 3]);
        $PROFESIONAL_CARTOGRAFO = Jobtitle::create(['name' => 'PROFESIONAL_CARTOGRAFO', 'id_boss' => $NO_DEFINIDO->id, 'level' => 3]);
        $Tecnico_Cartografico = Jobtitle::create(['name' => 'Tecnico Cartografico', 'id_boss' => $PROFESIONAL_CARTOGRAFO->id, 'level' => 3]);
        $Jefe_de_control_y_Administracion = Jobtitle::create(['name' => 'Jefe de control y Administracion', 'id_boss' => $Director_Administrativo_y_Financiero->id, 'level' => 2]);


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
