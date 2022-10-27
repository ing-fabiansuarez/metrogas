@extends('layouts.user_type.auth')

@section('content')
    <div class="row px-3">
        <div class="col-md-6">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Ajustes Generales
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="list-group ps-5 pe-3">

                            <a href="{{ route('user.index') }}"
                                class="list-group-item list-group-item-action">{{ __('sidebar.users') }}</a>
                            <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action">Roles</a>
                            <a href="{{ route('jobtitle.index') }}"
                                class="list-group-item list-group-item-action">{{ __('sidebar.jobtitles') }}</a>
                            <a href="{{ route('typeidenfification.index') }}"
                                class="list-group-item list-group-item-action">Tipo de Identificatión</a>
                            <a href="{{ route('centrodecostos.index') }}"
                                class="list-group-item list-group-item-action">Centro de Costos</a>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#viatic_configuration" aria-expanded="false"
                            aria-controls="viatic_configuration">
                            Ajustes Viáticos
                        </button>
                    </h2>
                    <div id="viatic_configuration" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="list-group ps-5 pe-3">

                            <a href="{{ route('destinationsite.index') }}"
                                class="list-group-item list-group-item-action">Sitios
                                Destino</a>
                            <a href="{{ route('originsite.index') }}" class="list-group-item list-group-item-action">Sitios
                                Origen</a>
                            <a href="{{ route('otherexpense.index') }}" class="list-group-item list-group-item-action">Otros
                                Gastos</a>
                            <a href="{{ route('otheritem.index') }}" class="list-group-item list-group-item-action">Items
                                Gestión</a>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-datos">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#datos_preoperacioneles_configuration" aria-expanded="false"
                            aria-controls="datos_preoperacioneles_configuration">
                            Ajustes Datos Preoperacionales
                        </button>
                    </h2>
                    <div id="datos_preoperacioneles_configuration" class="accordion-collapse collapse" aria-labelledby="flush-datos"
                        data-bs-parent="#accordionFlushExample">
                        <div class="list-group ps-5 pe-3">

                            <a href="{{ route('datospreoperacionelesmotos.index') }}"
                                class="list-group-item list-group-item-action">Datos Preoperacionales</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
