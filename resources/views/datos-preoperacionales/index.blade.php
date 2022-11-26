@extends('proveedores.layout.app')

@section('content')
    <section class="min-vh-100">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg bg-background-secundary"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-1 mt-5">Bienvenido!</h1>
                        <p class="text-lead text-white">Formulario de datos preoperacionales.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Escoge el tipo...</h5>
                        </div>


                        <div class="px-xl-4 px-sm-4 px-2 mb-2">

                            @if ($errors->any())
                                <div class="alert alert-danger" style="color: white;font-size: 0.7rem" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @error('msg-error')
                                <div class="alert alert-danger" style="color: white;font-size: 0.7rem" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2" data-bs-toggle="modal"
                                data-bs-target="#modalCarro">
                                AUTOMOVILES
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                MOTOCICLETAS
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Motocicletas</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datospreoperacionales.responseForm') }}" role="form text-left" method="POST">
                        <div class="mb-3">
                            @csrf
                            <input name="cedula" type="text" class="form-control" value="{{ old('cedula') }}"
                                placeholder="Número de Cedula">
                            @error('cedula')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                                <br>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input name="placa" type="text" class="form-control" placeholder="Placa"
                                value="{{ old('placa') }}">
                            @error('placa')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                                <br>
                            @enderror
                        </div>
                        <input type="hidden" name="type" value="{{ $ETipoVehiculo_MOTO }}">
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Ingresar</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="button" class="btn bg-gradient-dark">Ingresar</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCarro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Automoviles</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datospreoperacionales.responseForm') }}" role="form text-left" method="POST">
                        @csrf
                        {{-- <div class="mb-3">
                            <input name="cedula" type="text" class="form-control" value="{{ old('cedula') }}"
                                placeholder="Número de Cedula">
                            @error('cedula')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                                <br>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <input name="placa" type="text" class="form-control" placeholder="Placa"
                                value="{{ old('placa') }}">
                            @error('placa')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                                <br>
                            @enderror
                        </div>
                        <input type="hidden" name="type" value="{{ $ETipoVehiculo_CARRO }}">
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Ingresar</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="button" class="btn bg-gradient-dark">Ingresar</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
