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
    <h1>Legalización N° {{ $legalization->id }} esta COMPLETA!.</h1>
    <p>Para gestionar el proceso ingresa al siguiente enlace con sus credeciales del directorio activo.</p>
    <a href="{{ url('/') }}">Ingreso al sistema.</a>
    <br>

</body>

</html>
