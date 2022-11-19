<div>
    <section class="min-vh-100">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg bg-background-secundary"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <br>
                        <p style="font-size: 1.3rem" class="text-lead text-white"><b>F-HSEQ-07 LISTA DE CHEQUEO
                                PREOPERACIONAL DE MOTOCICLETAS Y/O DESPLAZAMIENTO V_7</b></p>
                        @if ($solo_lectura)
                            <p>
                                <b style="color: white">ID Formulario:</b>
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
                                                    <label class="form-control-label">1. Luz Delantera</label>
                                                    <select wire:model="model.luz_delantera"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.luz_delantera')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">2. Direccionales
                                                        Delanteros</label>
                                                    <select wire:model="model.direccionales_delantera"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.direccionales_delantera')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">3. Direccionales Traseros</label>
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
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">4. Stop</label>
                                                    <select wire:model="model.stop" class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($EBuenoMalo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.stop')
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
                                                    <label class="form-control-label">5. La Llanta delantera tiene
                                                        labrado y presión adecuada</label>
                                                    <select wire:model="model.presion_labrado_llanta_delantera"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.presion_labrado_llanta_delantera')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">6. La Llanta trasera tiene
                                                        labrado y presión adecuada</label>
                                                    <select wire:model="model.presion_labrado_llanta_trasera"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.presion_labrado_llanta_trasera')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">7. El Rin Delantero está en
                                                        buenas condiciones</label>
                                                    <select wire:model="model.rin_delantero"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.rin_delantero')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">8. Rin Trasero está en buenas
                                                        condiciones</label>
                                                    <select wire:model="model.rin_trasero"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.rin_trasero')
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
                                        <h6 class="mb-0">Varios</h6>
                                    </div>
                                    <div class="card-body pt-3 p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">10. Los testigos del Tacómetro
                                                        son funcionales</label>
                                                    <select wire:model="model.testigos_tacometros"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.testigos_tacometros')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">11. El Tanque de Gasolina tiene
                                                        fugas o abolladuras</label>
                                                    <select wire:model="model.tanque_gasolina"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.tanque_gasolina')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">12. El Cojín es ergonómico y se
                                                        encuentra en buen estado</label>
                                                    <select wire:model="model.cojin_argonomico"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.cojin_argonomico')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">13. Tiene la Placa en un lugar
                                                        visible</label>
                                                    <select wire:model="model.placa_visible"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.placa_visible')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">14. La moto está aseada</label>
                                                    <select wire:model="model.moto_aseada"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.moto_aseada')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">15. Los comandos del acelerador
                                                        están en buen estado</label>
                                                    <select wire:model="model.comandos_acelerador_buen_estado"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.comandos_acelerador_buen_estado')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">16. Tiene buena holgura y
                                                        funciona el Freno Delantero</label>
                                                    <select wire:model="model.freno_delantero"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.freno_delantero')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">17. Tiene buena holgura y
                                                        funciona el Freno Trasero</label>
                                                    <select wire:model="model.freno_trasero"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.freno_trasero')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">18. La Relación está en buenas
                                                        condiciones Revisar: Tensión y estado de piñones"</label>
                                                    <select wire:model="model.relacion"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.relacion')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">19. La Suspensión está en buen
                                                        estado</label>
                                                    <select wire:model="model.suspencion"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.suspencion')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">20. Buen nivel de fluidos
                                                        Revisar: Nivel de aceite y liquido de frenos</label>
                                                    <select wire:model="model.niveles_fluidos"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.niveles_fluidos')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">21. Dirección (Ajuste del
                                                        sistema)</label>
                                                    <select wire:model="model.direccion"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.direccion')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">22. El Pito es de moto y está en
                                                        buenas condiciones</label>
                                                    <select wire:model="model.pito" class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.pito')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">23. Los Espejos Retrovisores
                                                        están en buen estado</label>
                                                    <select wire:model="model.espejos_retrovisores"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.espejos_retrovisores')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">24. Se dispone de Casco
                                                        Certificado con visera</label>
                                                    <select wire:model="model.casco_certificado"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.casco_certificado')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">25. Se dispone de Chaleco o
                                                        uniforme reflectivo</label>
                                                    <select wire:model="model.chaleco"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.chaleco')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">26. Se dispone de Coderas y
                                                        rodilleras para moto</label>
                                                    <select wire:model="model.coderas_rodilleras"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.coderas_rodilleras')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">27. Se dispone de Guantes de
                                                        moto</label>
                                                    <select wire:model="model.guantes"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.guantes')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">28. Esta en buen estado el
                                                        reposapies</label>
                                                    <select wire:model="model.reposapies"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.reposapies')
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
                                                    <label class="form-control-label">26. SOAT</label>
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
                                                    <label class="form-control-label">27. RTM (revisión técnico
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
                                                    <label class="form-control-label">28. Licencia de
                                                        conducción</label>
                                                    <select wire:model="model.licencia_de_conduccion"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.licencia_de_conduccion')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">29. Tarjeta de propiedad</label>
                                                    <select wire:model="model.tarjeta_de_propiedad"
                                                        class="form-select form-select-sm"
                                                        @if ($solo_lectura) disabled @endif>
                                                        <option value="">--Seleccione--</option>
                                                        @foreach ($ESiNo as $item)
                                                            <option value="{{ $item->getId() }}">
                                                                {{ $item->getName() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.tarjeta_de_propiedad')
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
                                                    <label class="form-control-label">Fotografía del tacómetro (con
                                                        fecha y hora)
                                                    </label>
                                                    @if ($solo_lectura)
                                                        @if ($model->fotografia_tacometro)
                                                            <a target="_blank"
                                                                href="{{ Storage::url($model->fotografia_tacometro) }}"
                                                                class="btn btn-sm btn-round mb-0 me-1 bg-secundary">Ver</a>
                                                        @else
                                                            No Subido
                                                        @endif
                                                    @else
                                                        <br>
                                                        @if ($photo)
                                                            {{-- Preview Foto:
                                                             <img class="img-thumbnail"
                                                                src="{{ $photo->temporaryUrl() }}"> --}}
                                                        @endif
                                                        <input type="file" wire:model="photo" />

                                                        <div wire:loading wire:target="photo">Cargado imagen...</div>
                                                    @endif

                                                    @error('photo')
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
                                                        <br>
                                                        <input type="file" wire:model="fotografia_mantenimiento" />
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
