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
                                Natural</b></p>
                        @if ($solo_lectura)
                            <p>
                                <b style="color: white">ID Formulario: {{ $personaNatural->id }}</b>
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
                                            <select wire:model="personaNatural.empresa_id"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($empresas as $empresa)
                                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.empresa_id')
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
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombres</label>
                                            <input wire:model="personaNatural.nombres"
                                                class="form-control form-control-sm" type="text"
                                                placeholder="Nombres" @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaNatural.nombres')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-control-label">Apellidos</label>
                                            <input wire:model="personaNatural.apellidos"
                                                class="form-control form-control-sm" type="text"
                                                placeholder="Apellidos"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaNatural.apellidos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-control-label">Sexo / Género</label>
                                            <select wire:model="personaNatural.genero"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($generos as $gen)
                                                    <option value="{{ $gen->getId() }}">{{ $gen->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.genero')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Tipo Identificación</label>
                                            <select wire:model="personaNatural.tipo_identificacion"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($tipoIdentificaciones as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.tipo_identificacion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Número Identificación</label>
                                            <input wire:model="personaNatural.num_identificacion"
                                                class="form-control form-control-sm" type="number" placeholder="Número"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('personaNatural.num_identificacion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Lugar Expedición</label>
                                            <input wire:model="personaNatural.lugar_expedicion"
                                                class="form-control form-control-sm" type="text"
                                                placeholder="Lugar Expedición"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.lugar_expedicion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Fecha Expedición</label>
                                            <input wire:model="personaNatural.fecha_expedicion"
                                                class="form-control form-control-sm" type="date"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.fecha_expedicion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Estado Civil</label>
                                            <select wire:model="personaNatural.estado_civil"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($estadosciviles as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.estado_civil')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Nivel Educativo</label>
                                            <select wire:model="personaNatural.nivel_educativo"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($niveleseducacion as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.nivel_educativo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">¿Personas a cargo?</label>
                                            <select wire:model="personaNatural.personas_a_cargo"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.personas_a_cargo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Número de Personas</label>
                                            <input wire:model="personaNatural.num_personas_a_cargo"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.num_personas_a_cargo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Tipo Vivienda</label>
                                            <select wire:model="personaNatural.tipo_vivieda"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($tiposvivienda as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.tipo_vivieda')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Zona de Ubicación</label>
                                            <select wire:model="personaNatural.zona_de_ubicacion"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($ZonasUbicacion as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.zona_de_ubicacion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Fecha de Nacimiento</label>
                                            <input wire:model="personaNatural.fecha_nacimiento"
                                                class="form-control form-control-sm" type="date"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.fecha_nacimiento')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Ciudad</label>
                                            <input wire:model="personaNatural.ciudad_nacimiento"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.ciudad_nacimiento')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Departamento</label>
                                            <input wire:model="personaNatural.departamento_nacimiento"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.departamento_nacimiento')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Dirección de domicilio</label>
                                            <input wire:model="personaNatural.direccion_domicilio"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.direccion_domicilio')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Ciudad de domicilio</label>
                                            <input wire:model="personaNatural.ciudad_domicilio"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.ciudad_domicilio')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Departamento de domicilio</label>
                                            <input wire:model="personaNatural.departamento_domicilio"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.departamento_domicilio')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Correo electronico</label>
                                            <input wire:model="personaNatural.correo_electronico"
                                                class="form-control form-control-sm" type="email"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.correo_electronico')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Celular</label>
                                            <input wire:model="personaNatural.celular"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.celular')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Teléfono</label>
                                            <input wire:model="personaNatural.telefono"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.telefono')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Ocupación</label>
                                            <select wire:model="personaNatural.ocupacion"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($tiposocupaciones as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.ocupacion')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Código actividad CIIU Principal</label>
                                            <input wire:model="personaNatural.codigo_actividad_CIIU_principal"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.codigo_actividad_CIIU_principal')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Detalle Actividad Económica</label>
                                            <input wire:model="personaNatural.detalle_actividad_economica"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif />
                                            <span class="error">
                                                @error('personaNatural.detalle_actividad_economica')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-12 col-md-4">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Información Tributaria</h6>
                                    </div>
                                    <div class="card-body p-3">

                                        <div class="form-group">
                                            <label class="form-control-label">Gran contribuyente</label>
                                            <select wire:model="personaNatural.gran_contribuyente"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.gran_contribuyente')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Autorretenedor</label>
                                            <select wire:model="personaNatural.autorretenedor"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.autorretenedor')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Responsable de IVA</label>
                                            <select wire:model="personaNatural.responsable_iva"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.responsable_iva')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">¿Maneja dinero del estado o está
                                                expuesto públicamente?</label>
                                            <select wire:model="personaNatural.maneja_dinero_o_publicamente_expuesto"
                                                class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($Esino as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error">
                                                @error('personaNatural.maneja_dinero_o_publicamente_expuesto')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Datos Laborales</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nombre de la empresa</label>
                                                    <input wire:model="personaNatural.nombre_empresa"
                                                        class="form-control form-control-sm" type="text"
                                                        placeholder="Número"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.nombre_empresa')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Tipo Empresa o Negocio</label>
                                                    <select wire:model="personaNatural.tipo_empresa"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($tiposempresa as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.tipo_empresa')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Cargo</label>
                                                    <input wire:model="personaNatural.cargo_empresa"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif />
                                                    <span class="error">
                                                        @error('personaNatural.cargo_empresa')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Dirección de la empresa</label>
                                                    <input wire:model="personaNatural.direccion_empresa"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif />
                                                    <span class="error">
                                                        @error('personaNatural.direccion_empresa')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Ciudad</label>
                                                    <input wire:model="personaNatural.ciudad_empresa"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif />
                                                    <span class="error">
                                                        @error('personaNatural.ciudad_empresa')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Barrio</label>
                                                    <input wire:model="personaNatural.barrio_empresa"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif />
                                                    <span class="error">
                                                        @error('personaNatural.barrio_empresa')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Teléfono</label>
                                                    <input wire:model="personaNatural.telefono_empresa"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif />
                                                    <span class="error">
                                                        @error('personaNatural.telefono_empresa')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Datos Persona de Contacto</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nombre de contacto</label>
                                                    <input wire:model="personaNatural.nombre_contacto"
                                                        class="form-control form-control-sm" type="text"
                                                        placeholder="Número"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.nombre_contacto')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Cargo</label>
                                                    <input wire:model="personaNatural.cargo_contacto"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif />
                                                    <span class="error">
                                                        @error('personaNatural.cargo_contacto')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Teléfono</label>
                                                    <input wire:model="personaNatural.telefono_contacto"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif />
                                                    <span class="error">
                                                        @error('personaNatural.telefono_contacto')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Email</label>
                                                    <input wire:model="personaNatural.email_contacto"
                                                        class="form-control form-control-sm" type="email"
                                                        @if ($solo_lectura) disabled @endif />
                                                    <span class="error">
                                                        @error('personaNatural.email_contacto')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 mt-4">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">INFORMACIÓN PEP Persona Expuesta Políticamente
                                            (C.E.100-00016 de la Superintendencia de Sociedades)</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">a. ¿Administra recursos públicos
                                                        o es Persona Expuesta Políticamente (PEP)?</label>
                                                    <select wire:model="personaNatural.administra_recursos_publicos"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.administra_recursos_publicos')
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
                                                        wire:model="personaNatural.persona_expuesta_politicamente_extranjera"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.persona_expuesta_politicamente_extranjera')
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
                                                        wire:model="personaNatural.persona_expuesta_politicamente_orga_internacionales"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.persona_expuesta_politicamente_orga_internacionales')
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
                                                        wire:model="personaNatural.tiene_relacionados_cercanos_expuestos_politicamente"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.tiene_relacionados_cercanos_expuestos_politicamente')
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
                                                        @foreach ($listPersonasExpuestasPoliticamente as $index => $item)
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
                                                                        <a wire:click="$emit('deleteItemListPersonasExpuestasPoliticamente',{{ $index }})"
                                                                            style="color: red"
                                                                            class="btn btn-sm my-0">
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
                                                                                wire:model.defer="nombre"
                                                                                placeholder="Nombres y apellidos completos">
                                                                            @error('nombre')
                                                                                <span
                                                                                    class="text-danger text-message-validation">
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
                                                                                wire:model.defer="grado_de_parentezco"
                                                                                placeholder="Grado de Parentezco">
                                                                            @error('grado_de_parentezco')
                                                                                <span
                                                                                    class="text-danger text-message-validation">
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
                                                                                wire:model.defer="tipo_de_identificacion">
                                                                                <option value="" selected>
                                                                                    --Tipo Identificación--
                                                                                </option>
                                                                                @foreach ($tipoIdentificaciones as $object)
                                                                                    <option
                                                                                        value="{{ $object->id }}">
                                                                                        {{ $object->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('tipo_de_identificacion')
                                                                                <span
                                                                                    class="text-danger text-message-validation">
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
                                                                                wire:model.defer="numero_de_identificacion"
                                                                                placeholder="Número de Identificación">

                                                                            @error('numero_de_identificacion')
                                                                                <span
                                                                                    class="text-danger text-message-validation">
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
                                                                                wire:model.defer="entidad"
                                                                                placeholder="Entidad">
                                                                            @error('entidad')
                                                                                <span
                                                                                    class="text-danger text-message-validation">
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
                                                                                wire:model.defer="cargo"
                                                                                placeholder="Cargo">
                                                                            @error('cargo')
                                                                                <span
                                                                                    class="text-danger text-message-validation">
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
                                                                                wire:model.defer="fecha_vinculacion">
                                                                            @error('fecha_vinculacion')
                                                                                <span
                                                                                    class="text-danger text-message-validation">
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
                                                                                wire:model.defer="fecha_desvinculacion">
                                                                            @error('fecha_desvinculacion')
                                                                                <span
                                                                                    class="text-danger text-message-validation">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <a wire:click="$emit('addPersonaExpuestaPoliticamente')"
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
                            </div>


                            <div class="col-12 mt-4">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">INFORMACIÓN FINANCIERA</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Total ingresos mensuales</label>
                                                    <input wire:model="personaNatural.total_ingresos_mensuales"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.total_ingresos_mensuales')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Total egresos mensules</label>
                                                    <input wire:model="personaNatural.total_egresos_mensuales"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.total_egresos_mensuales')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Otros ingresos mensules</label>
                                                    <input wire:model="personaNatural.otros_ingresos_mensuales"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.otros_ingresos_mensuales')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Otros egresos mensuales</label>
                                                    <input wire:model="personaNatural.otros_egresos_mensuales"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.otros_egresos_mensuales')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Total activos</label>
                                                    <input wire:model="personaNatural.total_activos"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.total_activos')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Total pasivos</label>
                                                    <input wire:model="personaNatural.total_pasivos"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.total_pasivos')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">¿Es declarante de renta?</label>
                                                    <select wire:model="personaNatural.es_declarante_de_renta"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.es_declarante_de_renta')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">¿Realiza operaciones
                                                        internacionales?</label>
                                                    <select
                                                        wire:model="personaNatural.oi_realizar_opera_internacionales"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.oi_realizar_opera_internacionales')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">¿Posee cuentas en moneda
                                                        extranjera?</label>
                                                    <select
                                                        wire:model="personaNatural.oi_posee_cuentas_en_moneda_extranjera"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.oi_posee_cuentas_en_moneda_extranjera')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nombre de la entidad financiera:
                                                        (Operaciones Internacionales)</label>
                                                    <input wire:model="personaNatural.oi_nombre_entidad_financiera"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.oi_nombre_entidad_financiera')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Ciudad y/o Pais
                                                        (Operaciones Internacionales)</label>
                                                    <input wire:model="personaNatural.oi_ciudad_o_pais"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.oi_ciudad_o_pais')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Monto promedio mensual
                                                        (Operaciones Internacionales)</label>
                                                    <input wire:model="personaNatural.oi_monto_promedio_mesual"
                                                        class="form-control form-control-sm" type="number"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.oi_monto_promedio_mesual')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Moneda
                                                        (Operaciones Internacionales)</label>
                                                    <input wire:model="personaNatural.oi_moneda"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.oi_moneda')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Importaciones</label>
                                                    <select wire:model="personaNatural.oi_importaciones"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.oi_importaciones')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Exportaciones</label>
                                                    <select wire:model="personaNatural.oi_exportaciones"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.oi_exportaciones')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Inversiones</label>
                                                    <select wire:model="personaNatural.oi_inversiones"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.oi_inversiones')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Prestamos M/E</label>
                                                    <select wire:model="personaNatural.oi_prestamos_m_e"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.oi_prestamos_m_e')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">¿Factura
                                                        electrónicamente?</label>
                                                    <select wire:model="personaNatural.fe_factura_electronicamente"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($Esino as $gen)
                                                            <option value="{{ $gen->getId() }}">
                                                                {{ $gen->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error">
                                                        @error('personaNatural.fe_factura_electronicamente')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">¿Desde que fecha?</label>
                                                    <input wire:model="personaNatural.fe_desde_cuando"
                                                        class="form-control form-control-sm" type="date"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.fe_desde_cuando')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">DECLARACIÓN DE ORIGEN DE BIENES Y/O FONDOS</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Declaro que el origen de los
                                                        fondos con los cuales se maneja la cuenta y/o certificado
                                                        provienen de:</label>
                                                    <input wire:model="personaNatural.do_declaro_que_el_origen"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.do_declaro_que_el_origen')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Declaro que los bienes que poseo
                                                        provienen de:</label>
                                                    <input wire:model="personaNatural.do_declaro_provienen_de"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.do_declaro_provienen_de')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Declaro que los recursos
                                                        recibidos por las compras o contratos realizados con Invercolsa
                                                        S.A. no serán destinados a ninguna actividad ilícita de las
                                                        contempladas en el código penal colombiano o cualquier norma que
                                                        lo modifique o adicione:</label>
                                                    {{--  <input wire:model="personaNatural.do_declaro_recursos_recibidos"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.do_declaro_recursos_recibidos')
                                                            {{ $message }}
                                                        @enderror
                                                    </span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mt-4">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Referencia Personal</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nombre y Apellidos</label>
                                                    <input wire:model="personaNatural.ref_p_nombre"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_p_nombre')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Dirección</label>
                                                    <input wire:model="personaNatural.ref_p_direccion"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_p_direccion')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Teléfono</label>
                                                    <input wire:model="personaNatural.ref_p_telefono"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_p_telefono')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Parentesco</label>
                                                    <input wire:model="personaNatural.ref_p_parentesco"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_p_parentesco')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Ciudad</label>
                                                    <input wire:model="personaNatural.ref_p_ciudad"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_p_ciudad')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mt-4">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Referencia Familiar</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nombre y Apellidos</label>
                                                    <input wire:model="personaNatural.ref_f_nombre"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_f_nombre')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Dirección</label>
                                                    <input wire:model="personaNatural.ref_f_direccion"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_f_direccion')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Teléfono</label>
                                                    <input wire:model="personaNatural.ref_f_telefono"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_f_telefono')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Parentesco</label>
                                                    <input wire:model="personaNatural.ref_f_parentesco"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_f_parentesco')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Ciudad</label>
                                                    <input wire:model="personaNatural.ref_f_ciudad"
                                                        class="form-control form-control-sm" type="text"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('personaNatural.ref_f_ciudad')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
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
                                            <table class="table align-items-center justify-content-center mb-0">
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

                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                        <td>
                                                            <div class="d-flex px-2">
                                                                <div class="my-auto">
                                                                    <h6 class="mb-0 text-xs">Formato de Vinculación
                                                                        Persona Natural</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">Diligenciar y
                                                                Firmar </p>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">

                                                                @if (!$solo_lectura)
                                                                    <input
                                                                        wire:model.defer="support_formato_viculacion_persona_natural"
                                                                        class="form-control form-control-sm "
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_formato_viculacion_persona_natural')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_formato_viculacion_persona_natural)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_formato_viculacion_persona_natural) }}">
                                                                            <i class="cursor-pointer fas fa-eye text-secondary"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    @else
                                                                        No subido
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2">
                                                                <div class="my-auto">
                                                                    <h6 class="mb-0 text-xs">Cláusula de
                                                                        cumplimiento
                                                                        del código de ética
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">Diligenciar y
                                                                Firmar
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">

                                                                @if (!$solo_lectura)
                                                                    <input
                                                                        wire:model.defer="support_clausula_cumplimiento_codigo_etica"
                                                                        class="form-control form-control-sm pt-1"
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_clausula_cumplimiento_codigo_etica')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_clausula_cumplimiento_codigo_etica)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_clausula_cumplimiento_codigo_etica) }}">
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
                                                                    <h6 class="mb-0 text-xs">Fotocopia de la cédula
                                                                        de
                                                                        ciudadanía para colombianos y extranjeros
                                                                        nacionalizados (mayores de 18 años).
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">150%
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">

                                                                @if (!$solo_lectura)
                                                                    <input wire:model.defer="support_cedula_ciudadania"
                                                                        class="form-control form-control-sm pt-1"
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_cedula_ciudadania')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_cedula_ciudadania)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_cedula_ciudadania) }}">
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
                                                                    <h6 class="mb-0 text-xs">Fotocopia de la cédula
                                                                        de
                                                                        extranjería para extranjeros no
                                                                        nacionalizados
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">150%
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">

                                                                @if (!$solo_lectura)
                                                                    <input
                                                                        wire:model.defer="support_cedula_extranjeria"
                                                                        class="form-control form-control-sm pt-1"
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_cedula_extranjeria')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_cedula_extranjeria)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_cedula_extranjeria) }}">
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
                                                                    <h6 class="mb-0 text-xs">Registro único
                                                                        tributario
                                                                        (RUT)
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
                                                                    <h6 class="mb-0 text-xs">Cámara de comercio
                                                                        (cuando
                                                                        aplique)
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">No mayor a 30
                                                                días
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">

                                                                @if (!$solo_lectura)
                                                                    <input
                                                                        wire:model.defer="support_camara_de_comercio"
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
                                                                    <h6 class="mb-0 text-xs">Declaración de Renta o
                                                                        Certificado de No Declarante (cuando
                                                                        aplique)
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
                                                                    <input
                                                                        wire:model.defer="support_declaracion_de_renta_o_certificacion_no_declarante"
                                                                        class="form-control form-control-sm pt-1"
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_declaracion_de_renta_o_certificacion_no_declarante')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_declaracion_de_renta_o_certificacion_no_declarante)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_declaracion_de_renta_o_certificacion_no_declarante) }}">
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
                                                            <p class="text-xs font-weight-bold mb-0">No mayor a 30
                                                                días
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
                                                                    <h6 class="mb-0 text-xs">Certificado de
                                                                        Experiencia
                                                                        / Hoja de Vida
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
                                                                        wire:model.defer="support_certificado_experiencia_u_hoja_de_vida"
                                                                        class="form-control form-control-sm pt-1"
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_certificado_experiencia_u_hoja_de_vida')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_certificado_experiencia_u_hoja_de_vida)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_certificado_experiencia_u_hoja_de_vida) }}">
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
                                                                    <h6 class="mb-0 text-xs">Certificado
                                                                        profesional
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
                                                                        wire:model.defer="support_certificado_profesional"
                                                                        class="form-control form-control-sm pt-1"
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_certificado_profesional')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_certificado_profesional)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_certificado_profesional) }}">
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
                                                                    <h6 class="mb-0 text-xs">Referencias
                                                                        comerciales
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">No mayor a 30
                                                                días
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">

                                                                @if (!$solo_lectura)
                                                                    <input
                                                                        wire:model.defer="support_referencias_comerciales"
                                                                        class="form-control form-control-sm pt-1"
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_referencias_comerciales')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_referencias_comerciales)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_referencias_comerciales) }}">
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
                                                                    <h6 class="mb-0 text-xs">Afiliación seguridad
                                                                        social
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
                                                                        wire:model.defer="support_afiliacion_seguridad_social"
                                                                        class="form-control form-control-sm pt-1"
                                                                        type="file" accept="image/*,.pdf" />
                                                                    @error('support_afiliacion_seguridad_social')
                                                                        <span class="text-danger text-message-validation">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                @else
                                                                    @if ($support_afiliacion_seguridad_social)
                                                                        <a target="_blank"
                                                                            href="{{ Storage::url($support_afiliacion_seguridad_social) }}">
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
                                                        <input wire:model="personaNatural.terminos_y_condiciones"
                                                            class="form-check-input" type="checkbox"
                                                            id="fcustomCheck1"
                                                            @if ($solo_lectura) disabled @endif>
                                                        <label class="custom-control-label" for="customCheck1">Acepto
                                                            <a style="color: red" target="__blank"
                                                                href="{{ asset('storage/terminos_y_condiciones.pdf') }}">términos
                                                                y condiciones
                                                                de
                                                                MetroGas SA ESP</a> </label>
                                                        @error('personaNatural.terminos_y_condiciones')
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
                        </div>

                    </form>
                </div>
            </div>
    </section>
</div>
