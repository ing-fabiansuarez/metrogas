<div>
    <section class="min-vh-100">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg bg-background-secundary"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <br>
                        <p style="font-size: 1.3rem" class="text-lead text-white"><b>F-HSEQ-07 V_7 LISTA DE CHEQUEO
                                PREOPERACIONAL DE MOTOCICLETAS Y/O DESPLAZAMIENTO </b></p>
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
