<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Solicitud de Anticipo</title>
    <link id="pagestyle" href="{{ asset('/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    <style type="text/css">
        .logo {
            width: 150px;
        }

        .form-control1 {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-clip: padding-box;
            background-color: #e9ecef;
            border: 1px solid #d2d6da;
            border-radius: 0.5rem;
            color: #495057;
            display: block;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.4rem;
            transition: box-shadow .15s ease, border-color .15s ease;
            width: 100%;
        }
    </style>
</head>

<body style="color: black;font-size:0.8rem;">
    <h1>Solicitud de anticipo N° {{ $viaticRequest->id }} fue ANULADA.</h1>
    <p>Para gestionar el proceso ingresa al siguiente enlace con sus credeciales del directorio activo.</p>
    <a href="{{ url('/') }}">Ingreso al sistema.</a>
    <br>
    <br>
    <br>
    <table style="width: 100%">
        <tr>
            <td
                style=" width: 20%; border-radius: 30px; border-left: black 1px; border-top: black 1px;  border-bottom: black 1px; padding-left: 20px">
                <img src="{{ asset('/assets/img/logo.png') }}" class="logo" style="margin-right: 20px">
            </td>
            <td
                style=" width: 30%; line-height: 16px; border-radius: 30px; border-right: black 1px; border-top: black 1px;  border-bottom: black 1px;">
                NIT. 890.208.316-6 <br>
                Cll. 31A No. 26-15<br>
                Centro Empresarial La Florida Of. 504<br>
                PBX. 6384935 Emergencias 164<br>
                E-mail: metrogas@metrogassaesp.com<br>
                FLORIDABLANCA-SANTANDER
            </td>
            <td
                style=" border: black 1px; text-align: right; padding-left: 20px; padding-right: 10px; font-size: 1.5rem">
                Solicitud de Anticipo <br>
                N° {{ $viaticRequest->id }}
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;">
        <tr>
            <td style="width: 30%; padding-left: 15px">
                <b>FECHA SOLICITUD:</b>
            </td>
            <td colspan="3">
                {{ $viaticRequest->created_at }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 15px">
                <b>NOMBRE SOLICITANTE:</b>
            </td>
            <td colspan="3">
                {{ $viaticRequest->user->name }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 15px">
                <b>CARGO:</b>
            </td>
            <td>
                {{ $viaticRequest->user->jobtitle->name }}
            </td>
            <td>
                <b>NIVEL:</b>
            </td>
            <td>
                {{ $viaticRequest->user->jobtitle->level }}
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%">
        <tr>
            <td>
                <b>1. JUSTIFICACIÓN DEL ANTICIPO</b>
            </td>
        </tr>
        <tr>
            <td>
                <textarea class="form-control1" disabled>{{ $viaticRequest->justification }}</textarea>
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%">
        <tr>
            <td>
                <b>2. INFORMACION SOBRE LA COMISIÓN</b>
            </td>
        </tr>
    </table>
    <table style="width: 100%;border: black 1px solid;">
        <thead>
            <tr style="border: black 1px solid;">
                <th></th>

                <th class="text-center text-uppercase">
                    {{ __('forms.viatic_request.origin_site') }}
                </th>
                <th class="text-center text-uppercase">
                    {{ __('forms.viatic_request.destination_site') }}
                </th>
                <th class="text-center text-uppercase">
                    {{ __('forms.viatic_request.start_date') }}
                </th>
                <th class="text-center text-uppercase">
                    {{ __('forms.viatic_request.end_date') }}
                </th>
                <th class="text-center text-uppercase">
                    N° dias
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viaticRequest->sites as $index => $site)
                <tr>
                    <td>
                        Destino {{ $index + 1 }}
                    </td>
                    <td class="text-center">
                        {{ $site->originSite->name }}
                    </td>
                    <td class="text-center">
                        {{ $site->destinationSite->name }}
                    </td>
                    <td class="text-center">
                        {{ $site->start_date }}
                    </td>
                    <td class="text-center">
                        {{ $site->end_date }}
                    </td>
                    <td class="text-center">
                        {{ $site->calculateNumDays() }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <br>

    <table style="width: 100%">
        <tr>
            <td>
                <b>3. INFORMACIÓN SOBRE LAS TARIFAS</b>
            </td>
        </tr>
    </table>
    <table style="width: 100%;border: black 1px solid;">
        <thead>
            <tr style="border: black 1px solid;">
                <th></th>
                <th class="text-center text-uppercase">
                    {{ __('messages.accommodation') }}
                </th>
                <th class="text-center text-uppercase">
                    {{ __('messages.feeding') }}
                </th>
                <th class="text-center text-uppercase">
                    {{ __('messages.intermunicipal_transport') }}
                </th>
                <th class="text-center text-uppercase">
                    {{ __('messages.municipal_transport') }}
                </th>
                <th style="width: 15%" class="text-center text-uppercase">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viaticRequest->sites as $index => $site)
                <tr>
                    <td>
                        Destino {{ $index + 1 }}
                    </td>
                    <td class="text-center">
                        {{ number_format($site->accommodation_value) }}
                    </td>
                    <td class="text-center">
                        {{ number_format($site->feeding_value) }}
                    </td>
                    <td class="text-center">
                        {{ number_format($site->intermunicipal_trans_value) }}
                    </td>

                    <td class="text-center">
                        {{ number_format($site->municipal_trans_value) }}
                    </td>
                    <td class="text-center">
                        {{ number_format($site->total_value) }}
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
                        {{ $otherExpense->name }}
                    </td>
                    <td class="text-center">
                        {{ number_format($otherExpense->pivot->value) }}
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
                    <b>TOTAL ANTICIPO</b>
                </td>
                <td class="text-center">
                    {{ number_format($viaticRequest->getTotalViaticRequest()) }}
                </td>
            </tr>


        </tbody>

    </table>
    <br>
    <table style="width: 100%">
        <tr>
            <td>
                <b>4. GESTIÓN</b>
            </td>
        </tr>
        <tr>
            <td>
                <ul>
                    @foreach ($viaticRequest->otherItems as $item)
                        <li style="color: black;font-size: 0.8rem">
                            {{ $item->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td>
                <b>5. TERMINOS </b>
            </td>
        </tr>
        <tr>
            <td style="text-align: justify; line-height: 13px">
                Declaro haber recibido de Metrogas S.A. E.S.P. a título Anticipo de Gastos de Viaje, el monto aquí
                indicado, me comprometo a legalizar los gastos correspondientes y presentar los soportes que sustenten
                dichos gastos en un máximo de 3 días habiles después del viaje conforme al procedimiento de anticipos de
                viaje de METROGAS S.A. E.S.P, autorizando expresa e irrevocablemente a METROGAS S.A. E.S.P. para que en
                el evento de omitir la legalización respectiva, o que la misma no cumpla con las disposiciones
                contenidas en el documento referido, descuente del pago de la nómina del periodo siguiente, la suma del
                dinero correspondiente a los anticipos pendientes por legalizar o legalizados incorrectamente. De la
                misma manera y en el evento de que mi contrato termine, sin importar la causa de finalización autorizo a
                METROGAS S.A. E.S.P, para que compense o descuente los anticipos pendientes de mi liquidación final de
                salarios, prestaciones sociales, legales o extralegales, vacaciones e indemnizaciones y cualquier otra
                acreencia pendiente a mi favor.
            </td>
        </tr>
    </table>
    <br>
    {{-- <table style="width: 100%; border: black 1px solid;">
        <tr>
            <td>
                <b>FIRMA DE ACEPTACIÓN DEL SOLICITANTE </b>
            </td>
        </tr>
        <tr>
            <td>
                <br>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; line-height: 17px">
                <b>__________________________________________</b>
                <br>
                {{ $viaticRequest->user->name }} <br>
                CC.___________________ <br>
                {{ $viaticRequest->user->jobtitle->name }}
            </td>
        </tr>
    </table> --}}


</body>

</html>
