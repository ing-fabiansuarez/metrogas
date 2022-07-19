@extends('layouts.user_type.auth')
@section('content')
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <ul id="progressbar" class="px-0">
                <li style="width: 50%; color: red" class="active" id="account">
                    <strong>{{ __('messages.viatic_request') }}</strong>
                </li>
                <li style="width: 50%; color: red" class="active" id="anulada"><strong>Anulada</strong></li>
            </ul>
            <div class="progress">
                <div style="width: 100%;" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <br>


            <div class="form-card">
                <div class="row">
                    <div class="col-7">Finalizada
                        <h2 class="fs-title"></h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Paso 6</h2>
                    </div>
                </div>
                <br><br>
                <h2 class="purple-text text-center text-danger"><strong>ANULADA !</strong></h2>
                <br>

            </div>

            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Solicitud de anticipo</h2>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <div>
                            <span style="font-size: 1rem;color:black;"> <b>Solicitud N°
                                    {{ $viaticRequest->id }}</b></span>
                        </div>
                        <br>
                        <span style="font-size: 1rem">{{ $viaticRequest->user->name }}</span><br>
                        <span style="font-size: 0.8rem">{{ $viaticRequest->user->jobtitle->name }}</span><br>
                        <span style="font-size: 0.8rem">NIVEL {{ $viaticRequest->user->jobtitle->level }}</span>


                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
                    <textarea class="form-control form-control-sm" rows="3"
                        placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" disabled>{{ $viaticRequest->justification }}</textarea>
                </div>

                <div class="table-responsive p-0">
                    <label for="exampleFormControlTextarea1">{{ __('messages.information_about_comision') }}</label>
                    <div class="card bg-gray-100">
                        <div class="card-body p-2">
                            <table class="table table-hover table-bordered align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th></th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __('forms.viatic_request.origin_site') }}
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __('forms.viatic_request.destination_site') }}
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __('forms.viatic_request.start_date') }}
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __('forms.viatic_request.end_date') }}
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            N° dias
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viaticRequest->sites as $index => $site)
                                        <tr>
                                            <td>
                                                <span class="text-secondary text-xs">
                                                    Destino {{ $index + 1 }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $site->originSite->name }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $site->destinationSite->name }}
                                                </span>
                                            </td>

                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $site->start_date }}
                                                </span>
                                            </td>

                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $site->end_date }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $site->calculateNumDays() }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-0">
                    <label for="exampleFormControlTextarea1">{{ __('messages.rates') }}</label>

                    <table class="table table-hover table-bordered align-items-center mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('messages.accommodation') }}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('messages.feeding') }}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('messages.intermunicipal_transport') }}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('messages.municipal_transport') }}
                                </th>
                                <th style="width: 15%"
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viaticRequest->sites as $index => $site)
                                <tr>
                                    <td>
                                        <span class="text-secondary text-xs">
                                            Destino {{ $index + 1 }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button class="form-control form-control-sm"
                                                disabled>{{ number_format($site->accommodation_value) }}</button>
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button class="form-control form-control-sm"
                                                disabled>{{ number_format($site->feeding_value) }}</button>
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button class="form-control form-control-sm"
                                                disabled>{{ number_format($site->intermunicipal_trans_value) }}</button>
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>

                                    <td class="text-center">

                                        <div class="input-group">
                                            <button class="form-control form-control-sm"
                                                disabled>{{ number_format($site->municipal_trans_value) }}</button>
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button class="form-control form-control-sm"
                                                disabled>{{ number_format($site->total_value) }}</button>
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @foreach ($viaticRequest->otherExpenses as $otherExpense)
                                <tr>
                                    <td>
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs">
                                            {{ $otherExpense->name }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button class="form-control form-control-sm"
                                                disabled>{{ number_format($otherExpense->pivot->value) }}</button>
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                    <span class="text-secondary text-xs">
                                        TOTAL ANTICIPO
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="input-group">
                                        <button type="number" class="form-control form-control-sm"
                                            disabled>{{ number_format($viaticRequest->getTotalViaticRequest()) }}</button>
                                        <span class="input-group-text py-0">$</span>
                                    </div>
                                </td>
                            </tr>


                        </tbody>

                    </table>
                    @error('tipo_otro_gasto')
                        <span class="text-danger text-message-validation">
                            {{ $message }}
                        </span>
                        <br>
                    @enderror

                    @error('cantidad_otro_gasto')
                        <span class="text-danger text-message-validation">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- gestion y observaciones --}}
                <div class="row mt-3">
                    <div class="col-md-3">
                        {{-- Gestion --}}
                        <label class="mb-2">Gestión</label>
                        <ul class="list-group">
                            @foreach ($viaticRequest->otherItems as $item)
                                <li style="color: black;font-size: 0.8rem" class="list-group-item">
                                    {{ $item->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        {{-- Observacion --}}
                        <label class="mb-2">Observaciones</label>
                        @foreach ($viaticRequest->observations as $obs)
                            <div class="card bg-gray-200">
                                <div class="card-body p-3">
                                    <p style="font-size: 0.8rem" class="card-description mb-1">
                                        {{ $obs->message }}
                                    </p>
                                    <div class="author align-items-center">
                                        <div class="avatar shadow mx-2">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 488.4 488.4" style="enable-background:new 0 0 488.4 488.4;"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M416.2,73.398h-65.5c-39.9,0-72.2,32.3-72.2,72.2c0,31.9,20.7,58.9,49.4,68.5v34.4c0,3.2,3.9,4.8,6.1,2.5l33.2-33.2h49
                                                    c39.9,0,72.2-32.3,72.2-72.2C488.4,105.798,456,73.398,416.2,73.398z M362.7,154.598h-17.9v-17.9h17.9V154.598z M392.4,154.598
                                                    h-17.9v-17.9h17.9V154.598z M422,154.598h-17.9v-17.9H422V154.598z" />
                                                        <path
                                                            d="M329.1,347.598c-43.5-35.8-90.5-59.6-100.1-64.2c-1.1-0.5-1.7-1.6-1.7-2.8v-33.2c5.1-8.8,8.4-18.1,9.7-26.6
                                                    c3.7-0.3,8.6-5.5,13.9-24.1c6.8-23.9,0.5-28.7-5.7-28.7c0.6-2,1.1-4.1,1.4-6.1c11-65.9-21.5-68.2-21.5-68.2s-5.4-10.3-19.5-18.2
                                                    c-9.5-5.6-22.7-10-40.1-8.5c-5.6,0.3-11,1.4-16,3l0,0c-6.4,2.2-12.3,5.3-17.6,9c-6.5,4.1-12.7,9.2-18.1,15
                                                    c-8.6,8.8-16.2,20.1-19.6,34.3c-2.8,10.6-2.2,21.6,0.2,33.5l0,0c0.4,2,0.9,4.1,1.4,6.1c-6.1,0.1-12.1,5.1-5.4,28.6
                                                    c5.3,18.6,10.2,23.8,13.9,24.1c1.3,8.4,4.6,17.7,9.7,26.6v33.2c0,1.2-0.7,2.3-1.7,2.8c-9.5,4.7-56.5,28.4-100.1,64.2
                                                    c-7.8,6.4-12.2,16.1-12.2,26.2v48.1h341.5v-48.1C341.3,363.698,336.9,354.098,329.1,347.598z" />
                                                    </g>
                                                </g>
                                            </svg>

                                        </div>
                                        <div class="name ps-1">
                                            <span style="font-size: 0.7rem">{{ $obs->createBy->name }}</span>
                                            <div style="font-size: 0.7rem" class="stats">
                                                <small>{{ $obs->createBy->jobtitle->name }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>

                {{-- descargar anticipo --}}
                @if ($viaticRequest->url_aceptation != null)
                    <div class="row">
                        <div class="col-md-6">
                            <a target="_blank" href="{{ Storage::url($viaticRequest->url_aceptation) }}"
                                style="color: white" type="button" class="btn bg-secundary btn-sm">Descargar
                                Anticipo</a>
                        </div>
                    </div>
                @endif

                {{-- soportes --}}
                @if (count($viaticRequest->supports) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive p-0">
                                <label for="exampleFormControlTextarea1">SOPORTES</label>
                                <div class="card bg-gray-100">
                                    <div class="card-body p-2">

                                        <table class="table table-hover table-bordered align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Id
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Creado Por
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Observacion
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($viaticRequest->supports as $support)
                                                    <tr>
                                                        <td>
                                                            <span class="text-secondary text-xs">
                                                                {{ $support->id }}
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="text-secondary text-xs">
                                                                {{ $support->createdBy->name }}
                                                                <br>
                                                                <b> {{ $support->createdBy->jobtitle->name }}</b>
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="text-secondary text-xs">
                                                                {{ $support->observation }}
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a target="_blank"
                                                                href="{{ Storage::url($support->url) }}">
                                                                <i
                                                                    class="cursor-pointer fas fa-eye text-secondary"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <br>

        </div>
    </div>
@endsection
@push('css')
    <link href="../assets/css/progressbar.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="../assets/js/progressbar.js"></script>
@endpush
