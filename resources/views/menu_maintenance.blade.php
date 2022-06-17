@extends('layouts.user_type.auth')

@section('content')
    <div class="row px-3">
        <div class="col-md-6">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Seguridad
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="list-group ps-5 pe-3">

                            <a href="{{ url('usuarios') }}"
                                class="list-group-item list-group-item-action">{{ __('sidebar.users') }}</a>
                            <a href="{{ route('cargos.index') }}"
                                class="list-group-item list-group-item-action">{{ __('sidebar.jobtitles') }}</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
