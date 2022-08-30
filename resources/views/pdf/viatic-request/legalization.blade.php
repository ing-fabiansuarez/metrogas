<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Documento de Aceptación</title>
    <link id="pagestyle" href="{{ asset('/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    <style type="text/css">
        .logo {
            width: 80px;
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

        .con-border {
            border: black 1px solid;
        }
    </style>
</head>

<body style="color: black;font-size:0.8rem;">
    <table style="width: 100%">
        <tr>
            <td
                style=" width: 10%; border-radius: 30px; border-left: black 1px; border-top: black 1px;  border-bottom: black 1px; padding-left: 20px">
                <img src="{{ asset('/assets/img/logo.png') }}" class="logo" style="margin-right: 20px">
            </td>
            <td
                style=" border: black 1px; text-align: center; padding-left: 20px; padding-right: 10px; font-size: 1rem">
                FORMATO PARA LA LEGALIZACION DE CAJA MENOR O GASTOS DE VIAJE<br>
                N° {{ $legalization->id }}
            </td>
            <td
                style=" width: 150px; border: black 1px; text-align: right; padding-left: 20px; padding-right: 10px; font-size: 1rem">
                CODIGO: F-GAD-007 <br>
                Versión: 02 <br>
                Página
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;">
        <tr>
            <td style="width: 30%; padding-left: 15px">
                <b>TIPO DE LEGALIZACION:</b>
            </td>
            <td colspan="3">
                @if ($legalization->viaticRequest)
                    Anticipo
                @else
                    Reintegro
                @endif
            </td>
        </tr>

    </table>
    <br>





    <table style="width: 100%;">
        <tr>
            <td class="con-border" style="width: 20%; text-align: right; padding-right: 20px">
                <b>Nombre del responsable:</b>
            </td>
            <td class="con-border" style="padding-left: 10px; width: 25%">
                {{ $legalization->user->name }}
            </td>
            <td></td>
            <td class="con-border" style="padding-left: 10px;">Concepto</td>
            <td class="con-border" style="padding-left: 10px;">Número</td>
            <td class="con-border" style="padding-left: 10px;">Fecha</td>
            <td class="con-border" style="padding-left: 10px;">Valor</td>
        </tr>
        <tr>
            <td class="con-border" style=" text-align: right; padding-right: 20px">
                <b>Identificación:</b>
            </td>
            <td class="con-border" style="padding-left: 10px">
                @if ($legalization->viaticRequest)
                    {{ $legalization->viaticRequest->num_identification }}
                @endif
            </td>
            <td></td>
            <td class="con-border" style="padding-left: 10px"><b>
                    @if ($legalization->viaticRequest)
                        ANTICIPO
                    @else
                        REINTEGRO
                    @endif
                </b>
            </td>
            <td style="padding-left: 10px" class="con-border">
                @if ($legalization->viaticRequest)
                    {{ $legalization->viaticRequest->id }}
                @else
                    Reintegro
                @endif
            </td>
            <td style="padding-left: 10px" class="con-border">
                @if ($legalization->viaticRequest)
                    {{ date('d/m/Y', strtotime($legalization->viaticRequest->created_at)) }}
                @else
                    Reintegro
                @endif
            </td>
            <td style="padding-left: 10px" class="con-border">
                @if ($legalization->viaticRequest)
                    {{ number_format($legalization->viaticRequest->getTotalViaticRequest()) }}
                @else
                    Reintegro
                @endif
            </td>
        </tr>
        <tr>
            <td class="con-border" style=" text-align: right; padding-right: 20px">
                <b>Dependencia:</b>
            </td>
            <td class="con-border" style="padding-left: 10px">
                @if ($legalization->viaticRequest)
                    {{ $legalization->viaticRequest->centroDeCostos->name }}
                @endif
            </td>
            <td></td>
            <td class="con-border" style="padding-left: 10px"><b>LEGALIZACION</b></td>
            <td class="con-border" style="padding-left: 10px">{{ $legalization->id }}</td>
            <td class="con-border" style="padding-left: 10px">
                {{ date('d/m/Y', strtotime($legalization->created_at)) }}</td>
            <td class="con-border" style="padding-left: 10px">$ {{ number_format($legalization->calculateTotal()) }}
            </td>
        </tr>
        <tr>
            <td class="con-border" style=" text-align: right; padding-right: 20px">
                <b>Solicitud Anticipo:</b>
            </td>
            <td class="con-border" style="padding-left: 10px">
                @if ($legalization->viaticRequest)
                    {{ $legalization->viaticRequest->id }}
                @else
                    Reintegro
                @endif

            </td>
            <td></td>
            <td></td>
            <td></td>
            <td class="con-border" style="padding-left: 10px"><b>DIFERENCIA</b></td>
            <td class="con-border" style="padding-left: 10px">$
                {{ number_format($legalization->viaticRequest != null ? $legalization->viaticRequest->getTotalViaticRequest() : 0 - $legalization->calculateTotal()) }}

            </td>
        </tr>
    </table>

    <br>
    <p>Detalle de los pagos realizados con anticipo recibido y/o fondo de caja menor:</p>

    <table style="width: 100%;border: black 1px solid;">
        <tr>
            <th>NIT o CC</th>
            <th>NUMERO </th>
            <th>NOMBRE/RAZON SOCIAL</th>
            <th>DEBITO </th>
            <th>CREDITO </th>
            <th>BASE</th>
            <th>DESCRIPCION</th>
            <th>FECHA</th>
        </tr>

        @foreach ($legalization->supports as $item)
            <tr>
                <td style="border: black 1px solid;">{{ $item->typeIdentification->abrev }}</td>
                <td style="border: black 1px solid;">{{ $item->number_identification }}</td>
                <td style="border: black 1px solid;">{{ $item->company }}jfksdj sdjf akldjsf asdjfl asdjf dfk asd
                    fklasdf ajsdlfk asdf </td>
                <td style="border: black 1px solid;">$ {{ number_format($item->total_factura) }}</td>
                <td style="border: black 1px solid;">$ 0</td>
                <td style="border: black 1px solid;"></td>
                <td style="border: black 1px solid;">{{ $item->observation }}</td>
                <td style="border: black 1px solid;">{{ $item->date_factura }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2"></td>
            <td colspan="4"> </td>
            <td><b>Efectivo</b></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><b>ELABORADO POR:</b></td>
            <td colspan="4"><b> {{ strtoupper($legalization->user->name) }}</b></td>
            <td><b>Valor vales</b></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="4">{{ $legalization->user->jobtitle->name }}</td>
            <td><b>Total</b></td>
            <td>$ {{ number_format($legalization->calculateTotal()) }}</td>
        </tr>
    </table>


</body>

</html>
