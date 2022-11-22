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
                            <h5>Ingresa los datos...</h5>
                        </div>


                        <div class="px-xl-4 px-sm-4 px-2 mb-2">
                            @error('msg-error')
                                <div class="alert alert-danger" style="color: white;font-size: 0.7rem" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <form action="{{ route('datospreoperacionales.responseForm') }}" role="form text-left"
                                method="POST">
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

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
