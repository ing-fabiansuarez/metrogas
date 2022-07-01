<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.png') }}">
    <title>
        MetroGas
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/ui-fabian.css') }}" rel="stylesheet" />
    <style type="text/css" media="screen">

    </style>

</head>

<body
    class="g-sidenav-show  bg-gray-100 {{ \Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '') }} ">

    <div class="container-fluid py-4">
        <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
            <div id="msform">


                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Aceptación Empleado</h2>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div>
                                    <span style="font-size: 1rem;color:black;"> <b>Solicitud N°
                                            {{ $viaticRequest->id }}</b></span>
                                </div>
                                <br>
                                <span style="font-size: 1rem">{{ $viaticRequest->user->name }}</span><br>
                                <span style="font-size: 0.8rem">{{ $viaticRequest->user->jobtitle->name }}</span><br>
                                <span style="font-size: 0.8rem">NIVEL
                                    {{ $viaticRequest->user->jobtitle->level }}</span>


                            </div>

                        </div>
                        <div class="form-group">
                            <label
                                for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
                            <textarea class="form-control form-control-sm" rows="3"
                                placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" disabled>{{ $viaticRequest->justification }}</textarea>
                        </div>

                        <div class="table-responsive p-0">
                            <label
                                for="exampleFormControlTextarea1">{{ __('messages.information_about_comision') }}</label>
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

                        <label for="exampleFormControlTextarea1">{{ __('messages.rates') }}</label>

                        <table class="table table-hover table-bordered align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('messages.accommodation') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('messages.feeding') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('messages.intermunicipal_transport') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                                {{ $index + 1 }}
                                            </span>
                                        </td>
                                        <td class="text-center">

                                            <span class="text-secondary text-xs">
                                                {{ number_format($site->accommodation_value) }}
                                            </span>

                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs">
                                                {{ number_format($site->feeding_value) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs">
                                                {{ number_format($site->intermunicipal_trans_value) }}
                                            </span>
                                        </td>

                                        <td class="text-center">
                                            <span class="text-secondary text-xs">
                                                {{ number_format($site->municipal_trans_value) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs">
                                                {{ number_format($site->total_value) }}
                                            </span>
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
                                            <span class="text-secondary text-xs">
                                                {{ number_format($otherExpense->pivot->value) }}
                                            </span>

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
                                        <span class="text-secondary text-xs">
                                            {{ number_format($viaticRequest->getTotalViaticRequest()) }}
                                        </span>
                                    </td>
                                </tr>


                            </tbody>

                        </table>
                     
                    </div>

                    <br>
                </fieldset>
            </div>
        </div>
    </div>
</body>

</html>
