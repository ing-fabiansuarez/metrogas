<div>
    <section class="min-vh-100">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg bg-background-secundary"
            style="background-image: url({{ url('/') }}/assets/img/logos/logos_invercolsa.png);background-size: cover;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <br>
                        <p style="font-size: 1.3rem" class="text-lead text-white"><b>Formulario de Registro Persona
                                Juridica</b></p>
                        @if ($solo_lectura)
                            <p>
                                <b style="color: white">ID Formulario: {{ $personaJuridica->id }}</b>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
                    <form wire:submit.prevent="save">

                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Empresa para la cual desea hacer el registro: </h6>
                            </div>
                            <div class="card-body pt-3 p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Empresa</label>
                                            <select wire:model="personaJuridica.empresa_id"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($empresas as $empresa)
                                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.empresa_id')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Información del Solicitante</h6>
                            </div>
                            <div class="card-body pt-3 p-3">


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Razon Social</label>
                                            <input wire:model="personaJuridica.razon_social"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.razon_social')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">NIT</label>
                                            <input wire:model="personaJuridica.nit" class="form-control form-control-sm"
                                                type="number" placeholder="Número NIT"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.nit')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-control-label">DV</label>
                                            <input wire:model="personaJuridica.digito_verificador"
                                                class="form-control form-control-sm" type="number"
                                                placeholder="Digito Verificación"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.digito_verificador')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Sigla</label>
                                            <input wire:model="personaJuridica.sigla"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.sigla')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Dirección Principal</label>
                                            <input wire:model="personaJuridica.direccion_principal"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.direccion_principal')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Ciudad</label>
                                            <input wire:model="personaJuridica.ciudad_infor_solicitante"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.ciudad_infor_solicitante')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Tipo Empresa</label>
                                            <select wire:model="personaJuridica.tipo_empresa"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($tiposEmpresas as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.tipo_empresa')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Forma Juridica</label>
                                            <input wire:model="personaJuridica.forma_juridica"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.forma_juridica')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Pagina Web</label>
                                            <input wire:model="personaJuridica.pagina_web"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.pagina_web')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Correo Electronico Notificaciones</label>
                                            <input wire:model="personaJuridica.correo_electronico_notificacion"
                                                class="form-control form-control-sm" type="email"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.correo_electronico_notificacion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Celular</label>
                                            <input wire:model="personaJuridica.celular"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.celular')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Telefono Fijo</label>
                                            <input wire:model="personaJuridica.telefono_fijo"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.telefono_fijo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Información Tributaria</h6>
                            </div>
                            <div class="card-body pt-3 p-3">


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Gran contribuyente</label>
                                            <select wire:model="personaJuridica.gran_contribuyente"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.gran_contribuyente')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Autorretenedor</label>
                                            <select wire:model="personaJuridica.autorretenedor"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.autorretenedor')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Reponsable de IVA</label>
                                            <select wire:model="personaJuridica.responsable_iva"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.responsable_iva')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">RST</label>
                                            <input wire:model="personaJuridica.rst"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rst')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Código actividad CIIU Principal</label>
                                            <input wire:model="personaJuridica.codigo_ciiu_actividad_principal"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.codigo_ciiu_actividad_principal')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Descripción de la actividad CIIU
                                                Principal</label>
                                            <input wire:model="personaJuridica.descripcion_actividad__ciiu"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.descripcion_actividad__ciiu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <p style="font-size: 0.7rem">
                                        <b>
                                            ¿La organización está obligada y tiene implementado un sistema de
                                            administración
                                            de riesgos de lavado de activos y financiación del terrorismo (SARLAFT,
                                            SARO,
                                            SAGRILAFT u otro equivalente)?
                                        </b>
                                    </p>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">¿Esta Obligada?</label>
                                            <select wire:model="personaJuridica.esta_obligada"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.esta_obligada')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">¿Tiene un sistema implementado?</label>
                                            <select
                                                wire:model="personaJuridica.tiene_implementado_un_sistema_de_administracion_de_riesgo_de_lavado_de_activos"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.tiene_implementado_un_sistema_de_administracion_de_riesgo_de_lavado_de_activos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Representante Legal</h6>
                            </div>
                            <div class="card-body pt-3 p-3">

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombres</label>
                                            <input wire:model="personaJuridica.rl_nombre"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rl_nombre')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Apellidos</label>
                                            <input wire:model="personaJuridica.rl_apellido"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rl_apellido')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Tipo Identificación</label>
                                            <select class="form-select form-select-sm"
                                                aria-label=".form-select-sm example"
                                                wire:model.defer="personaJuridica.rl_tipo_documento">
                                                <option value="" selected>
                                                    --Tipo Identificación--
                                                </option>
                                                @foreach ($tipoIdentificaciones as $object)
                                                    <option value="{{ $object->id }}">
                                                        {{ $object->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('personaJuridica.rl_tipo_documento')
                                                <span class="text-danger text-message-validation">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Número Documento</label>
                                            <input wire:model="personaJuridica.rl_num_docuemnto"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rl_num_docuemnto')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Fecha Expedición</label>
                                            <input wire:model="personaJuridica.rl_fecha_expedicion"
                                                class="form-control form-control-sm" type="date"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rl_fecha_expedicion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Ciudad Expedición</label>
                                            <input wire:model="personaJuridica.rl_ciudad_expedicion"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rl_ciudad_expedicion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <p style="font-size: 0.7rem">
                                        <b>
                                            Respecto del representante legal favor diligenciar la siguiente información:
                                            <br>
                                            INFORMACIÓN PEP Persona Expuesta Politicamente ( C.E 100-000016
                                            Superintendencia de Sociedades)
                                        </b>
                                    </p>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">a. ¿Administra recursos públicos
                                                o es Persona Expuesta Políticamente (PEP)?</label>
                                            <select
                                                wire:model="personaJuridica.rl_administra_recursos_publicos_o_es_pep"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.rl_administra_recursos_publicos_o_es_pep')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">b. ¿Es Persona Expuesta
                                                Políticamente Extranjera?</label>
                                            <select
                                                wire:model="personaJuridica.rl_persona_expuesta_pliticamente_extrajera"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.rl_persona_expuesta_pliticamente_extrajera')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">c. ¿Es Persona Expuesta
                                                Politicamente de organizaciones internacionales?</label>
                                            <select
                                                wire:model="personaJuridica.rl_persona_expuesta_politicamente_de_organizaciones_internacionales"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.rl_persona_expuesta_politicamente_de_organizaciones_internacionales')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">d. ¿Tiene relacionados
                                                (familiares o asociados) cercanos Expuestos
                                                Políticamente?</label>
                                            <select
                                                wire:model="personaJuridica.rl_tiene_relecionados_cercanos_expuestos_politicamente"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.rl_tiene_relecionados_cercanos_expuestos_politicamente')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <p style="font-size: 0.7rem">


                                        <b>
                                            "Si usted declara que ""SI"" en cualquiera de los literales
                                            anteriores
                                            favor
                                            diligenciar la información suya y la de sus relacionados en el
                                            siguiente
                                            cuadro, de acuerdo con los literales señalados a continuación:</b>
                                        <br>
                                        a. Persona con sociedad conyugal, de hecho o de derecho (esposo, esposa,
                                        compañero permanente). <br>
                                        b. Familiar hasta el segundo grado de consanguinidad (padres, abuelos,
                                        hermanos, hijos, nietos). <br>
                                        c. Familiar hasta el segundo grado de afinidad (padre, madre, hijos,
                                        abuelos, nietos, hermanos, del conyugue o compañero/a
                                        permanente). <br>
                                        d. Familiar de relación primero civil (hijos adoptivos o padres
                                        adoptivos)
                                        <br>
                                        e. Persona asociada de una persona jurídica y, además, sea propietario
                                        directa o indirectamente con una participación superior al 5% de la
                                        persona
                                        jurídica, o ejerza el control de la persona jurídica, en los términos
                                        del
                                        artículo 261 del Código de Comercio."
                                    </p>


                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                                        Nombres y apellidos completos</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Grado de Parentezco</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Tipo identificación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Número de identificación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Entidad en la cual se desempeña como PEP</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Cargo</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Fecha de vinculación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Fecha de desvinculación</th>
                                                    <th>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPersonasExpuestasPoliticamenteRL as $index => $item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2">

                                                                <div class="my-auto">
                                                                    <h6 class="mb-0 text-sm">
                                                                        {{ $item['nombre'] }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['grado_de_parentezco'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['tipo_de_identificacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['numero_de_identificacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['entidad'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['cargo'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['fecha_vinculacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['fecha_desvinculacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            @if (!$solo_lectura)
                                                                <a wire:click="$emit('deleteItemListPersonasExpuestasPoliticamenteRL',{{ $index }})"
                                                                    style="color: red" class="btn btn-sm my-0">
                                                                    Eliminar</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @if (!$solo_lectura)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" wire:model.defer="nombreRL"
                                                                        placeholder="Nombres y apellidos completos">
                                                                    @error('nombreRL')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text"
                                                                        wire:model.defer="grado_de_parentezcoRL"
                                                                        placeholder="Grado de Parentezco">
                                                                    @error('grado_de_parentezcoRL')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <select class="form-select form-select-sm"
                                                                        aria-label=".form-select-sm example"
                                                                        wire:model.defer="tipo_de_identificacionRL">
                                                                        <option value="" selected>
                                                                            --Tipo Identificación--
                                                                        </option>
                                                                        @foreach ($tipoIdentificaciones as $object)
                                                                            <option value="{{ $object->id }}">
                                                                                {{ $object->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('tipo_de_identificacionRL')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="number"
                                                                        wire:model.defer="numero_de_identificacionRL"
                                                                        placeholder="Número de Identificación">

                                                                    @error('numero_de_identificacionRL')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" wire:model.defer="entidadRL"
                                                                        placeholder="Entidad">
                                                                    @error('entidadRL')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" wire:model.defer="cargoRL"
                                                                        placeholder="Cargo">
                                                                    @error('cargoRL')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="date"
                                                                        wire:model.defer="fecha_vinculacionRL">
                                                                    @error('fecha_vinculacionRL')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="date"
                                                                        wire:model.defer="fecha_desvinculacionRL">
                                                                    @error('fecha_desvinculacionRL')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a wire:click="$emit('addPersonaExpuestaPoliticamenteRL')"
                                                                class="btn bg-gradient-primary btn-sm mt-0">
                                                                Agregar</a>
                                                        </td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">BENEFICIARIO(S) FINAL(ES) ACCIONISTAS O ASOCIADOS QUE TENGAN DIRECTA
                                    O INDIRECTAMENTE MÁS DEL 5% DEL CAPITAL SOCIAL, APORTE O PARTICIPACIÓN
                                </h6>
                            </div>
                            <div class="card-body pt-3 p-3">

                                <div class="row">
                                    <p style="font-size: 0.7rem">
                                        <b>
                                            En caso que los relacionados sean jurídicas favor relacionar sus
                                            composiciones hasta el beneficiario final.
                                        </b>
                                    </p>

                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                                        RAZÓN SOCIAL O NOMBRE COMPLETO DE LA PERSONA</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Tipo identificación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Número de identificación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        % Participación Capital Social </th>
                                                    <th>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listBeneficiariosFinales as $index => $item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2">

                                                                <div class="my-auto">
                                                                    <h6 class="mb-0 text-sm">
                                                                        {{ $item['bf_razon_social'] }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['bf_tipo_identificacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['bf_numero_identificacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['bf_participacion_capital'] }}</span>
                                                        </td>

                                                        <td>
                                                            @if (!$solo_lectura)
                                                                <a wire:click="$emit('deleteListBeneficiariosFinales',{{ $index }})"
                                                                    style="color: red" class="btn btn-sm my-0">
                                                                    Eliminar</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @if (!$solo_lectura)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text"
                                                                        wire:model.defer="bf_razon_social"
                                                                        placeholder="Nombres y apellidos completos">
                                                                    @error('bf_razon_social')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <select class="form-select form-select-sm"
                                                                        aria-label=".form-select-sm example"
                                                                        wire:model.defer="bf_tipo_identificacion">
                                                                        <option value="" selected>
                                                                            --Tipo Identificación--
                                                                        </option>
                                                                        @foreach ($tipoIdentificaciones as $object)
                                                                            <option value="{{ $object->id }}">
                                                                                {{ $object->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('bf_tipo_identificacion')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="number"
                                                                        wire:model.defer="bf_numero_identificacion"
                                                                        placeholder="Número de Identificación">

                                                                    @error('bf_numero_identificacion')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text"
                                                                        wire:model.defer="bf_participacion_capital"
                                                                        placeholder="%">
                                                                    @error('bf_participacion_capital')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>



                                                        <td>
                                                            <a wire:click="$emit('addListBeneficiariosFinales')"
                                                                class="btn bg-gradient-primary btn-sm mt-0">
                                                                Agregar</a>
                                                        </td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Respecto de los beneficiarios finales, favor diligenciar la
                                    siguiente información:</h6>
                            </div>
                            <div class="card-body pt-3 p-3">
                                <div class="row">

                                    <p style="font-size: 0.7rem">
                                        <b>
                                            INFORMACIÓN PEP Persona Expuesta Politicamente ( C.E 100-000016
                                            Superintendencia de Sociedades)
                                        </b>
                                    </p>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">a. ¿Administra recursos públicos
                                                o es Persona Expuesta Políticamente (PEP)?</label>
                                            <select
                                                wire:model="personaJuridica.bf_administra_recursos_publicos_o_es_pep"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.bf_administra_recursos_publicos_o_es_pep')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">b. ¿Es Persona Expuesta
                                                Políticamente Extranjera?</label>
                                            <select
                                                wire:model="personaJuridica.bf_persona_expuesta_pliticamente_extrajera"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.bf_persona_expuesta_pliticamente_extrajera')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">c. ¿Es Persona Expuesta
                                                Politicamente de organizaciones internacionales?</label>
                                            <select
                                                wire:model="personaJuridica.bf_persona_expuesta_politicamente_de_organizaciones_internacionales"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.bf_persona_expuesta_politicamente_de_organizaciones_internacionales')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">d. ¿Tiene relacionados
                                                (familiares o asociados) cercanos Expuestos
                                                Políticamente?</label>
                                            <select
                                                wire:model="personaJuridica.bf_tiene_relecionados_cercanos_expuestos_politicamente"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.bf_tiene_relecionados_cercanos_expuestos_politicamente')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <p style="font-size: 0.7rem">


                                        <b>
                                            "Si usted declara que ""SI"" en cualquiera de los literales
                                            anteriores
                                            favor
                                            diligenciar la información suya y la de sus relacionados en el
                                            siguiente
                                            cuadro, de acuerdo con los literales señalados a continuación:</b>
                                        <br>
                                        a. Persona con sociedad conyugal, de hecho o de derecho (esposo, esposa,
                                        compañero permanente). <br>
                                        b. Familiar hasta el segundo grado de consanguinidad (padres, abuelos,
                                        hermanos, hijos, nietos). <br>
                                        c. Familiar hasta el segundo grado de afinidad (padre, madre, hijos,
                                        abuelos, nietos, hermanos, del conyugue o compañero/a
                                        permanente). <br>
                                        d. Familiar de relación primero civil (hijos adoptivos o padres
                                        adoptivos)
                                        <br>
                                        e. Persona asociada de una persona jurídica y, además, sea propietario
                                        directa o indirectamente con una participación superior al 5% de la
                                        persona
                                        jurídica, o ejerza el control de la persona jurídica, en los términos
                                        del
                                        artículo 261 del Código de Comercio."
                                    </p>



                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                                        Nombres y apellidos completos</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Grado de Parentezco</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Tipo identificación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Número de identificación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Entidad en la cual se desempeña como PEP</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Cargo</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Fecha de vinculación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                        Fecha de desvinculación</th>
                                                    <th>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPersonasExpuestasPoliticamenteBF as $index => $item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2">

                                                                <div class="my-auto">
                                                                    <h6 class="mb-0 text-sm">
                                                                        {{ $item['nombre'] }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['grado_de_parentezco'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['tipo_de_identificacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['numero_de_identificacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['entidad'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['cargo'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['fecha_vinculacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-xs font-weight-bold">{{ $item['fecha_desvinculacion'] }}</span>
                                                        </td>
                                                        <td>
                                                            @if (!$solo_lectura)
                                                                <a wire:click="$emit('deleteItemListPersonasExpuestasPoliticamenteBF',{{ $index }})"
                                                                    style="color: red" class="btn btn-sm my-0">
                                                                    Eliminar</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @if (!$solo_lectura)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" wire:model.defer="nombreBF"
                                                                        placeholder="Nombres y apellidos completos">
                                                                    @error('nombreBF')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text"
                                                                        wire:model.defer="grado_de_parentezcoBF"
                                                                        placeholder="Grado de Parentezco">
                                                                    @error('grado_de_parentezcoBF')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <select class="form-select form-select-sm"
                                                                        aria-label=".form-select-sm example"
                                                                        wire:model.defer="tipo_de_identificacionBF">
                                                                        <option value="" selected>
                                                                            --Tipo Identificación--
                                                                        </option>
                                                                        @foreach ($tipoIdentificaciones as $object)
                                                                            <option value="{{ $object->id }}">
                                                                                {{ $object->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('tipo_de_identificacionBF')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="number"
                                                                        wire:model.defer="numero_de_identificacionBF"
                                                                        placeholder="Número de Identificación">

                                                                    @error('numero_de_identificacionBF')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" wire:model.defer="entidadBF"
                                                                        placeholder="Entidad">
                                                                    @error('entidadBF')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" wire:model.defer="cargoBF"
                                                                        placeholder="Cargo">
                                                                    @error('cargoBF')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="date"
                                                                        wire:model.defer="fecha_vinculacionBF">
                                                                    @error('fecha_vinculacionBF')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <div class="form-group">
                                                                    <input class="form-control form-control-sm"
                                                                        type="date"
                                                                        wire:model.defer="fecha_desvinculacionBF">
                                                                    @error('fecha_desvinculacionBF')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a wire:click="$emit('addPersonaExpuestaPoliticamenteBF')"
                                                                class="btn bg-gradient-primary btn-sm mt-0">
                                                                Agregar</a>
                                                        </td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Información financiera</h6>
                            </div>
                            <div class="card-body pt-3 p-3">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Total Ingresos</label>
                                            <input wire:model="personaJuridica.if_total_ingresos"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.if_total_ingresos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Total Egresos</label>
                                            <input wire:model="personaJuridica.if_total_egresos"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.if_total_egresos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Otros Ingresos</label>
                                            <input wire:model="personaJuridica.if_otros_ingresos"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.if_otros_ingresos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Otros Egresos</label>
                                            <input wire:model="personaJuridica.if_otros_egresos"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.if_otros_egresos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Total Activos</label>
                                            <input wire:model="personaJuridica.if_total_activos"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.if_total_activos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Total Pasivos</label>
                                            <input wire:model="personaJuridica.if_total_pasivos"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.if_total_pasivos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Mes de corte de la información financiera
                                                suministrada</label>
                                            <input wire:model="personaJuridica.if_mes_corte_informacion_financiera"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.if_mes_corte_informacion_financiera')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Año de corte de la información financiera
                                                suministrada</label>
                                            <input wire:model="personaJuridica.if_ano_corte_informacion_financiera"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.if_ano_corte_informacion_financiera')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="form-control-label">¿Es declarante de renta?</label>
                                        <select wire:model="personaJuridica.if_declarante_de_renta"
                                            class="form-select form-select-sm"
                                            @if ($solo_lectura) disabled @endif>
                                            <option value="">--Seleccione--</option>
                                            @foreach ($Esino as $gen)
                                                <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="error">
                                            @error('personaJuridica.if_declarante_de_renta')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Operaciones Internacionales</h6>
                            </div>
                            <div class="card-body pt-3 p-3">


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Realiza operaciones
                                                internacionales</label>
                                            <select wire:model="personaJuridica.oi_realiza_op_internacionales"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.oi_realiza_op_internacionales')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Posee cuentas en moneda
                                                extranjera</label>
                                            <select wire:model="personaJuridica.oi_posee_cuentas_en_moneda_extranjera"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.oi_posee_cuentas_en_moneda_extranjera')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombre de la entidad financiera</label>
                                            <input wire:model="personaJuridica.oi_nombre_de_entidad_financiera"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.oi_nombre_de_entidad_financiera')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Ciudad</label>
                                            <input wire:model="personaJuridica.oi_ciudad"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.oi_ciudad')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Pais</label>
                                            <input wire:model="personaJuridica.oi_pais"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.oi_pais')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Monto promedio mensual</label>
                                            <input wire:model="personaJuridica.oi_monto_promedio_mensual"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.oi_monto_promedio_mensual')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Moneda</label>
                                            <input wire:model="personaJuridica.oi_moneda"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.oi_moneda')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Importaciones</label>
                                            <select wire:model="personaJuridica.oi_importaciones"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.oi_importaciones')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Exportaciones</label>
                                            <select wire:model="personaJuridica.oi_exportaciones"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.oi_exportaciones')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Inversiones</label>
                                            <select wire:model="personaJuridica.oi_inversiones"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.oi_inversiones')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Prestamos M/E</label>
                                            <select wire:model="personaJuridica.oi_prestamos_m_e"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.oi_prestamos_m_e')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>




                                </div>

                            </div>
                        </div>



                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Información de Facturación</h6>
                            </div>
                            <div class="card-body pt-3 p-3">


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">¿Factura electrónicamente?</label>
                                            <select wire:model="personaJuridica.fe_factura_electronica"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.fe_factura_electronica')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">¿Desde que fecha?</label>
                                            <input wire:model="personaJuridica.fe_fecha_desde_que_factura"
                                                class="form-control form-control-sm" type="date"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.fe_fecha_desde_que_factura')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">¿Desde que fecha?</label>
                                            <input wire:model="personaJuridica.fe_fecha_desde_que_factura"
                                                class="form-control form-control-sm" type="date"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.fe_fecha_desde_que_factura')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <p style="font-size: 0.7rem">
                                        <b>
                                            Datos para envío de Factura Digital/Factura Electrónica
                                        </b>
                                    </p>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombre del contacto</label>
                                            <input wire:model="personaJuridica.fe_envio_nombre"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.fe_envio_nombre')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Cargo</label>
                                            <input wire:model="personaJuridica.fe_envio_cargo"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.fe_envio_cargo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Correo electrónico</label>
                                            <input wire:model="personaJuridica.fe_envio_correo_electronico"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.fe_envio_correo_electronico')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    {{--  <p style="font-size: 0.7rem">
                                        <b>
                                            Datos recepción Factura Digital/Factura Electrónica
                                        </b>
                                    </p>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombre del contacto</label>
                                            <input wire:model="personaJuridica.fe_recepcion_nombre"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.fe_recepcion_nombre')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Cargo</label>
                                            <input wire:model="personaJuridica.fe_recepcion_cargo"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.fe_recepcion_cargo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Correo electrónico</label>
                                            <input wire:model="personaJuridica.fe_recepcion_correo_electronico"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.fe_recepcion_correo_electronico')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div> --}}




                                </div>
                            </div>
                        </div>


                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">DECLARACIÓN DE ORIGEN DE BIENES Y / O FONDOS</h6>
                            </div>
                            <div class="card-body pt-3 p-3">
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Declaro que el origen de los fondos con
                                                los cuales se maneja la cuenta de la Entidad que represento provienen
                                            </label>
                                            <input wire:model="personaJuridica.do_declaro_origen_de_fondos"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.do_declaro_origen_de_fondos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Declaro que los bienes que posee la
                                                Entidad que represento provienen
                                            </label>
                                            <input wire:model="personaJuridica.do_declaro_que_posee_la_entidad"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.do_declaro_que_posee_la_entidad')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Declaro que los recursos recibidos por
                                                las compras o contratos realizados con Metrogas De Colombia S.A. ESP NO
                                                serán destinados a ninguna actividad ilícita de las contempladas en el
                                                código penal colombiano o cualquier norma que lo modifique o adicione.
                                            </label>
                                            {{--  <input
                                                wire:model="personaJuridica.do_declaro_que_los_recursos_recibidos_por_las"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.do_declaro_que_los_recursos_recibidos_por_las')
                                                    {{ $message }}
                                                @enderror
                                            </span> --}}
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>



                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Referencias Comerciales</h6>
                            </div>
                            <div class="card-body pt-3 p-3">
                                <div class="row">


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombre del establecimiento
                                            </label>
                                            <input wire:model="personaJuridica.rc_nombre_del_establecimiento"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rc_nombre_del_establecimiento')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombre de contacto del establecimiento
                                            </label>
                                            <input wire:model="personaJuridica.rc_nombre_del_contacto"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rc_nombre_del_contacto')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-control-label">Dirección
                                            </label>
                                            <input wire:model="personaJuridica.rc_direccion"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rc_direccion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-control-label">Ciudad
                                            </label>
                                            <input wire:model="personaJuridica.rc_ciudad"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rc_ciudad')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-control-label">Teléfono
                                            </label>
                                            <input wire:model="personaJuridica.rc_telefono"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.rc_telefono')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">CERTIFICACION PREVENCIÓN LAVADO DE ACTIVOS Y FINANCIACIÓN DEL
                                    TERRORISMO ACREEDOR
                                    SOLO ES OBLIGATORIO PARA LAS CONTRAPARTES QUE POR NORMAS LEGALES DEBEN ADOPTAR
                                    SISTEMAS DE PREVENCIÓN DEL LAFTPADM</h6>
                            </div>
                            <div class="card-body pt-3 p-3">
                                <div class="row">


                                    <p style="font-size: 0.7rem">
                                        <b>
                                            Este documento tiene como propósito certificar a Metrogas de Colombia S.A.,
                                            que nuestra entidad cuenta con un SISTEMA DE ADMINISTRACIÓN DE RIESGOS DE
                                            LAVADO DE ACTIVOS, FINANCIACIÓN DEL TERRORISMO Y PROLIFERACION DE ARMAS DE
                                            DESTRUCCION MASIVA, el cual cumple a cabalidad con las normas colombianas
                                            que le son aplicables.
                                        </b>
                                    </p>

                                    <p style="font-size: 0.7rem">
                                        <b>
                                            Así las cosas,
                                        </b>
                                    </p>
                                    <div class="form-group">
                                        <input wire:model="personaJuridica.cer_asi_las_cosas"
                                            class="form-control form-control-sm" type="text"
                                            placeholder="Representante legal"
                                            @if ($solo_lectura) disabled @endif>
                                        <span class="error">
                                            @error('personaJuridica.cer_asi_las_cosas')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <p style="font-size: 0.7rem">
                                        <b>
                                            en mi calidad de representante legal de
                                        </b>
                                    </p>
                                    <div class="form-group">
                                        <input wire:model="personaJuridica.cer_entidad"
                                            class="form-control form-control-sm" type="text" placeholder="Entidad"
                                            @if ($solo_lectura) disabled @endif>
                                        <span class="error">
                                            @error('personaJuridica.cer_entidad')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <p style="font-size: 0.7rem">
                                        <b>
                                            (LA ENTIDAD), CERTIFICO que:
                                        </b>
                                    </p>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">1. ¿LA ENTIDAD esta obligada a
                                                implementar un sistema de prevención del LAFTPADM?</label>
                                            <select wire:model="personaJuridica.cer_obligada_laftpadm"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.cer_obligada_laftpadm')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">2. ¿LA ENTIDAD da cumplimiento a las
                                                normas y regulaciones colombianas relacionadas con la prevención y el
                                                control de lavado de activos y la financiación del terrorismo que le son
                                                aplicables?
                                            </label>
                                            <select wire:model="personaJuridica.cer_cumple_nomrmas"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.cer_cumple_nomrmas')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">3. ¿LA ENTIDAD cuenta con adecuadas
                                                políticas, manuales y procedimientos de prevención y control de lavado
                                                de activos y financiación del terrorismo, que dan cabal
                                            </label>
                                            <select wire:model="personaJuridica.cer_cuenta_con_adecuadas_pliticas"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.cer_cuenta_con_adecuadas_pliticas')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">4. ¿Ha estado involucrada LA ENTIDAD en
                                                investigaciones por violación a las leyes relacionadas con lavado de
                                                activos y financiación de terrorismo?
                                            </label>
                                            <select wire:model="personaJuridica.cer_ha_estado_involucrada"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.cer_ha_estado_involucrada')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">5. ¿ Ha sido sancionada LA ENTIDAD o
                                                alguno de sus empleados o directivos por violación de las leyes
                                                relacionadas con lavado de activos y financiación de terrorismo?
                                            </label>
                                            <select wire:model="personaJuridica.cer_ha_sido_sancionada"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaJuridica.cer_ha_sido_sancionada')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <p style="font-size: 0.7rem">
                                        <b>
                                            Informar los siguientes datos del oficial o empleado de cumplimiento:
                                        </b>
                                    </p>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombres
                                            </label>
                                            <input wire:model="personaJuridica.cer_nombres"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.cer_nombres')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Apellidos
                                            </label>
                                            <input wire:model="personaJuridica.cer_apellidos"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.cer_apellidos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Teléfono
                                            </label>
                                            <input wire:model="personaJuridica.cer_telefono"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.cer_telefono')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Correo Electronico
                                            </label>
                                            <input wire:model="personaJuridica.cer_correo_electronico"
                                                class="form-control form-control-sm" type="email"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.cer_correo_electronico')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Dirección
                                            </label>
                                            <input wire:model="personaJuridica.cer_direccion"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.cer_direccion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>



                        <div class="col-12 mt-4">
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <h6>Soportes</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0"
                                            style="font-size: 0.7rem">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Documento</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Observación</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Subir</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Cláusula de cumplimiento
                                                                    del código de ética
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Diligenciar y
                                                            Firmar
                                                        </p>
                                                        <a target="_blank" style="font-size: 0.7rem; color: green;"
                                                            href="{{ asset('assets/documentos/anexo_clasula_etica.pdf') }}">
                                                            Descargar formato
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_clausula_cumplimiento_codigo"
                                                                    class="form-control form-control-sm "
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_clausula_cumplimiento_codigo')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_clausula_cumplimiento_codigo)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_clausula_cumplimiento_codigo) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">
                                                                    Compromiso antisoborno y anticorrupción
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Diligenciar y
                                                            Firmar
                                                        </p>
                                                        <a target="_blank" style="font-size: 0.7rem; color: green;"
                                                            href="{{ asset('assets/documentos/compromiso_antisoborno_y_anticorrupcion.pdf') }}">
                                                            Descargar formato
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_antisoborno_anticorrupcion"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_antisoborno_anticorrupcion')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_antisoborno_anticorrupcion)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_antisoborno_anticorrupcion) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">
                                                                    Certificado emitido por contador/revisor fiscal de
                                                                    la composición accionaria.
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            En caso de no aplicar una certificación
                                                        </p>
                                                        {{--  <a target="_blank" style="font-size: 0.7rem; color: green;"
                                                            href="{{ asset('assets/documentos/compromiso_antisoborno_y_anticorrupcion.pdf') }}">
                                                            support_composicion_accionaria
                                                        </a> --}}
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_composicion_accionaria"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_composicion_accionaria')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_composicion_accionaria)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_composicion_accionaria) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Cámara de Comercio

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">No Mayor a 30 días
                                                            <br>
                                                            * Obligatorio
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input wire:model.defer="support_camara_de_comercio"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_camara_de_comercio')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_camara_de_comercio)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_camara_de_comercio) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Fotocopia del documento
                                                                    del Representante Legal

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">150%
                                                            <br>
                                                            * Obligatorio
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_documento_representante_legal"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_documento_representante_legal')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_documento_representante_legal)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_documento_representante_legal) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Certificación Bancaria

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">No Mayor a 30 días
                                                            <br>
                                                            * Obligatorio
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_certificacion_bancaria"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_certificacion_bancaria')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_certificacion_bancaria)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_certificacion_bancaria) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Registro único tributario
                                                                    (RUT)

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Vigente
                                                            <br>
                                                            * Obligatorio
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input wire:model.defer="support_rut"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_rut')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_rut)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_rut) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Estados Financieros
                                                                    comparados
                                                                    - resumidos - sin notas

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">2 años
                                                            inmediatamente anteriores
                                                            <br>
                                                            * Obligatorio

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_estados_financieros_compartivos"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_estados_financieros_compartivos')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_estados_financieros_compartivos)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_estados_financieros_compartivos) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Declaración de Renta

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Año
                                                            inmediatamente
                                                            anterior

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input wire:model.defer="support_declaracion_de_renta"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_declaracion_de_renta')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_declaracion_de_renta)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_declaracion_de_renta) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Certificado de
                                                                    implementación del SG-SST ( Si aplica)

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Vigente

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_certificado_implementacion_sg_sst"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_certificado_implementacion_sg_sst')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_certificado_implementacion_sg_sst)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_certificado_implementacion_sg_sst) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Certificado de
                                                                    implementación Protocolos de Bioseguridad ( Si
                                                                    aplica)

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Vigente

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_certificado_implementacion_bioseguridad"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_certificado_implementacion_bioseguridad')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_certificado_implementacion_bioseguridad)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_certificado_implementacion_bioseguridad) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Certificado de Experiencia
                                                                    contractual ( Si aplica)
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Vigente
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_certificado_experiencia_contractual"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_certificado_experiencia_contractual')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_certificado_experiencia_contractual)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_certificado_experiencia_contractual) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Certificaciones técnicas
                                                                    según categoría (Licencia, ISO, OHSAS, ONAC,
                                                                    INVIMA) ( Si aplica)

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Vigente
                                                            Según aplique

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_certificados_tecnicas_categoria"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_certificados_tecnicas_categoria')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_certificados_tecnicas_categoria)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_certificados_tecnicas_categoria) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Referencia Comercial ( Si
                                                                    aplica)

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">No Mayor a 30
                                                            días

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input wire:model.defer="support_referencia_comercial"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_referencia_comercial')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_referencia_comercial)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_referencia_comercial) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">Carta de autorización de
                                                                    consignación de fondos firmada por el
                                                                    Representante legal


                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Vigente
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">


                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_carta_autorizacion_fondos_rl"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_carta_autorizacion_fondos_rl')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_carta_autorizacion_fondos_rl)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_carta_autorizacion_fondos_rl) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-xs">En caso de estar
                                                                    regulada, certificación de cumplir con normativa
                                                                    de riesgos de LA/FT


                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">Vigente
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            @if (!$solo_lectura)
                                                                <input
                                                                    wire:model.defer="support_certificacion_de_normativa_riesgos"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('support_certificacion_de_normativa_riesgos')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            @else
                                                                @if ($support_certificacion_de_normativa_riesgos)
                                                                    <a target="_blank"
                                                                        href="{{ Storage::url($support_certificacion_de_normativa_riesgos) }}">
                                                                        <i class="cursor-pointer fas fa-eye text-secondary"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    No subido
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Información de quien diligencia</h6>
                            </div>
                            <div class="card-body pt-3 p-3">


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombre</label>
                                            <input wire:model="personaJuridica.nombre_quien_diligencia"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.nombre_quien_diligencia')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Cedula</label>
                                            <input wire:model="personaJuridica.cedula_quien_diligencia"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.cedula_quien_diligencia')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Celular o Teléfono</label>
                                            <input wire:model="personaJuridica.celular_quien_diligencia"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.celular_quien_diligencia')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Cargo</label>
                                            <input wire:model="personaJuridica.cargo_quien_diligencia"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaJuridica.cargo_quien_diligencia')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>






                                </div>

                            </div>
                        </div>



                        @if (!$solo_lectura)
                            <div class="col-12 my-4">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">ACEPTACIÓN</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input wire:model="personaJuridica.terminos_y_condiciones"
                                                        class="form-check-input" type="checkbox"
                                                        id="fcustomCheck1"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <label class="custom-control-label" for="customCheck1">Acepto
                                                        <a style="color:red" target="__blank"
                                                            href="{{ asset('storage/terminos_y_condiciones.pdf') }}">términos
                                                            y condiciones
                                                            de
                                                            MetroGas SA ESP</a> </label>
                                                    @error('personaJuridica.terminos_y_condiciones')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                        <br>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        @if (!$solo_lectura)
                            <div class="row mt-4 justify-content-center">
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-sm btn-round mb-0 me-1 bg-background-secundary">Guardar y
                                        enviar</button>
                                </div>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
    </section>
</div>
