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
                        <p class="text-lead text-white">Formulario de registro de proveedores de la empresa MetroGas SA
                            ESP.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-11 col-lg-11 col-md-11 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Selecciona el Tipo de Persona que eres...</h5>
                        </div>
                        <div class="px-xl-5 px-sm-4 px-3 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('proveedor.register.persona-natural') }}">
                                        <div class="card card-background move-on-hover mt-3">
                                            <div class="full-background"
                                                style="background-image: url({{ url('../assets/img/persona_juridica.jpg') }})">
                                            </div>
                                            <div class="card-body pt-9">
                                                <h4 class="text-white">Persona Natural</h4>
                                                <p>FORMATO DE VINCULACIÓN PERSONA NATURAL...</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('proveedor.register.persona-juridica') }}">
                                        <div class="card card-background move-on-hover mt-3">
                                            <div class="full-background"
                                                style="background-image: url('https://prueba.metrogasesp.com/wp-content/uploads/2022/07/rawpixel-799380-unsplash.jpg')">
                                            </div>
                                            <div class="card-body pt-9">
                                                <h4 class="text-white">Persona Juridica</h4>
                                                <p>FORMATO DE VINCULACIÓN PERSONA JURIDICA...</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
