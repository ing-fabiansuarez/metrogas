@extends('proveedores.layout.app')

@section('content')
    <section class="min-vh-100">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg bg-background-secundary"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-1 mt-5">Muchas gracias por su respuesta!</h1>
                        <p class="text-lead text-white">Se guardo correctamente el formulario.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-11 col-lg-11 col-md-11 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <a href="https://metrogasesp.com/" target="_blank"
                                class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Ir pagina web</a>
                        </div>
                        <div class="px-xl-6 px-sm-6 px-3 mb-3">
                            <div class="usr-name">
                                <span><img src="{{ url('/assets/img/logos/logos_invercolsa.png') }}" alt="Logo invercolsa" class="img-fluid">
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
