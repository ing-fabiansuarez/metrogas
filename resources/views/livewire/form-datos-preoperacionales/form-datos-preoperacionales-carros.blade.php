<div>
    <section class="min-vh-100">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg bg-background-secundary"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <br>
                        <p style="font-size: 1.3rem" class="text-lead text-white"><b>LISTA DE CHEQUEO PREOPERACIONAL DE
                                CARROS DIARIOS Y/O DESPLAZAMIENTO F-HSEQ-07 V_7 </b></p>
                        @if ($solo_lectura)
                            <p>
                                <b style="color: white">ID Formulario:</b>
                            </p>
                            <p>
                                <b style="color: white">Fecha Creación: {{ $model->created_at }}</b>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">



                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Información del Solicitante</h6>
                            </div>
                            <div class="card-body pt-3 p-3">


                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Correo Electronico</label>
                                            <input wire:model="model.correo" class="form-control form-control-sm"
                                                type="email" @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.correo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Centro Operativo</label>
                                            <input wire:model="model.lugar_trabajo" class="form-control form-control-sm"
                                                type="text" @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.lugar_trabajo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombres Completos</label>
                                            <input wire:model="model.nombre_completo"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.nombre_completo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Número de Cedula</label>
                                            <input wire:model="model.cedula" class="form-control form-control-sm"
                                                type="text" @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.cedula')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Area</label>
                                            <input wire:model="model.area" class="form-control form-control-sm"
                                                type="text" @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.area')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Cargo</label>
                                            <input wire:model="model.cargo" class="form-control form-control-sm"
                                                type="text" @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.cargo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Placas Vehiculo</label>
                                            <input wire:model="model.placa_vehiculo"
                                                class="form-control form-control-sm" type="text"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.placa_vehiculo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Modelo</label>
                                            <input wire:model="model.modelo" class="form-control form-control-sm"
                                                type="text" @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.modelo')
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
                                <h6 class="mb-0">Información Vehiculo</h6>
                            </div>
                            <div class="card-body pt-3 p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Kilometraje inicio de la jornada</label>
                                            <input wire:model="model.kilometraje_inicio_jornada"
                                                class="form-control form-control-sm" type="number"
                                                @if ($solo_lectura) disabled @endif>
                                            <span class="error">
                                                @error('model.kilometraje_inicio_jornada')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Niveles de Aceite</label>
                                            <select wire:model="model.niveles_aceite" class="form-select form-select-sm"
                                                @if ($solo_lectura) disabled @endif>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($ENivelAceite as $item)
                                                    <option value="{{ $item->getId() }}">{{ $item->getName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('model.niveles_aceite')
                                                <span class="text-danger text-message-validation">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>



                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Luces</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">1. Luces retroceso y
                                                        parqueo</label>
                                                    <select wire:model="model.luces_retroceso_parqueo"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.luces_retroceso_parqueo')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">2. Luces altas y bajas</label>
                                                    <select wire:model="model.luces_altas_bajas"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.luces_altas_bajas')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">3. Direccionales delanteras,
                                                        parqueo y giro</label>
                                                    <select wire:model="model.direccionales_delanteras"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.direccionales_delanteras')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">4. Direccionales traseras,
                                                        parqueo y giro</label>
                                                    <select wire:model="model.direccionales_traseras"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.direccionales_traseras')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Sistema de Advertencia </h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">5.Pito o Bocina</label>
                                                    <select wire:model="model.pito_bocina"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.pito_bocina')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Cabina </h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">7. Espejos central y
                                                        laterales</label>
                                                    <select wire:model="model.espejos_centrales_laterales"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.espejos_centrales_laterales')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">8. Puertas de Acceso al
                                                        Vehículo</label>
                                                    <select wire:model="model.puertas_acceso_vehiculo"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.puertas_acceso_vehiculo')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">9. El Vidrio frontal</label>
                                                    <select wire:model="model.vidrio_frontal"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.vidrio_frontal')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">10. Vidrios laterales y
                                                        trasero</label>
                                                    <select wire:model="model.vidrios_laterales_trasero"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.vidrios_laterales_trasero')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">11. Indicadores(hidráulico,
                                                        velocímetro, temperatura, combustible) son funcionales</label>
                                                    <select wire:model="model.indicadores"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.indicadores')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Llantas</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">12. Todas las ruedas tienen sus
                                                        espárragos completos</label>
                                                    <select wire:model="model.llantas_esparragos"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.llantas_esparragos')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">13. Están en buen estado sin
                                                        cortaduras profundas, ni abultamientos</label>
                                                    <select wire:model="model.rudas_buen_estado"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.rudas_buen_estado')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">14. La llanta de repuesto y
                                                        equipo para cambio de llantas existen y están en buen
                                                        estado</label>
                                                    <select wire:model="model.llanta_repuesto"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.llanta_repuesto')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">15. Presión de inflado de las
                                                        llantas es adecuada(Revisión visual)</label>
                                                    <select wire:model="model.presion"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.presion')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Condiciones mecánicas </h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">16. Caja de cambios</label>
                                                    <select wire:model="model.caja_cambios"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.caja_cambios')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">17. Los pedales (acelerador,
                                                        freno, cloche)</label>
                                                    <select wire:model="model.pedales"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.pedales')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">18. Latas y pintura</label>
                                                    <select wire:model="model.latas_pintura"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.latas_pintura')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">19. Freno de emergencia</label>
                                                    <select wire:model="model.freno_emergencia"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.freno_emergencia')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">20. Buen nivel de fluidos,
                                                        hidráulico, refrigerante, dirección, frenos y agua
                                                        batería</label>
                                                    <select wire:model="model.nivel_fluidos"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.nivel_fluidos')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>












                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Equipo de prevención y seguridad (Kit carretera) Articulo 30
                                            Código Nacional de Tránsito </h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">21. Conos reflectivos</label>
                                                    <select wire:model="model.conos_reflectivos"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.conos_reflectivos')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">22. Gato con capacidad para
                                                        elevar el vehículo.</label>
                                                    <select wire:model="model.gato" class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.gato')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">23. Linterna</label>
                                                    <select wire:model="model.linterna"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.linterna')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">24. Cruceta</label>
                                                    <select wire:model="model.cruceta"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.cruceta')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">25. Dos señales de carretera en
                                                        forma de triángulo en material reflectivo y provistas de
                                                        soportes para ser colocadas en forma vertical o lámparas de
                                                        señal de luz amarilla intermitentes o de destello</label>
                                                    <select wire:model="model.senales"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.senales')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">26. Dos tacos para bloquear el
                                                        vehículo.</label>
                                                    <select wire:model="model.tacos"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.tacos')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">27. La Caja de herramienta básica
                                                        como mínimo contiene: Alicate, destornilladores, llave de
                                                        expansión y llaves fijas</label>
                                                    <select wire:model="model.caja_herramienta"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.caja_herramienta')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">28. Llanta de repuesto</label>
                                                    <select wire:model="model.llantas_repuesto"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.llantas_repuesto')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Vigencia de los siguientes elementos</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">29. Extintor vigente y en buen
                                                        estado</label>
                                                    <select wire:model="model.extintor"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.extintor')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">30. Botiquín con todos los
                                                        elementos vigentes y en buen estado</label>
                                                    <select wire:model="model.botiquin"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.botiquin')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Documentos legales vigentes</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">31. SOAT</label>
                                                    <select wire:model="model.soat" class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.soat')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">32. RTM (revisión técnico
                                                        mecánica)</label>
                                                    <select wire:model="model.rtm" class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.rtm')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">33. Licencia de
                                                        conducción</label>
                                                    <select wire:model="model.licencia_conduccion"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.licencia_conduccion')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">34. Tarjeta de propiedad</label>
                                                    <select wire:model="model.tarjeta_propuedad"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.tarjeta_propuedad')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card z-index-0 mt-3">
                                    <div class="card-header pb-0 px-3">
                                        <h6 class="mb-0">Otros</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Observaciones: En este espacio
                                                        describa el numeral con los hallazgos o si ha realizado
                                                        mantenimiento a su motocicleta (Anexe registro de
                                                        mantenimiento)</label>
                                                    <input wire:model="model.observacion"
                                                        class="form-control form-control-sm" type="text"
                                                        placeholder="Observación"
                                                        @if ($solo_lectura) disabled @endif>
                                                    <span class="error">
                                                        @error('model.observacion')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Fotografía del vehículo (con
                                                        fecha y hora)
                                                    </label>
                                                    @if ($solo_lectura)
                                                        @if ($model->fotografia_vehiculo)
                                                            <a target="_blank"
                                                                href="{{ Storage::url($model->fotografia_vehiculo) }}"
                                                                class="btn btn-sm btn-round mb-0 me-1 bg-secundary">Ver</a>
                                                        @else
                                                            No Subido
                                                        @endif
                                                    @else
                                                        <input wire:model="fotografia_vehiculos" accept="image/*"
                                                            class="form-control form-control-sm " type="file" />
                                                    @endif

                                                    @error('fotografia_vehiculos')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Fotografía de mantenimiento (cada
                                                        vez que se realice)
                                                    </label>
                                                    @if ($solo_lectura)
                                                        @if ($model->fotografia_mantenimiento)
                                                            <a target="_blank"
                                                                href="{{ Storage::url($model->fotografia_mantenimiento) }}"
                                                                class="btn btn-sm btn-round mb-0 me-1 bg-secundary">Ver</a>
                                                        @else
                                                            No Subido
                                                        @endif
                                                    @else
                                                        <input wire:model="fotografia_mantenimiento" accept="image/*"
                                                            class="form-control form-control-sm " type="file" />
                                                    @endif
                                                    @error('fotografia_mantenimiento')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">He diligenciado personalmente el
                                                        documento de inspección preoperacional
                                                    </label>
                                                    <select wire:model="model.ha_diligenciado_ud_mismo"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.ha_diligenciado_ud_mismo')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                        @if (!$solo_lectura)
                            <div class="row mt-4 justify-content-center">
                                <div class="col-6">
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
