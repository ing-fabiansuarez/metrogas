<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Formulario</title>
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

        table {
            border: rgb(142, 142, 167) 1px solid;
        }

        .subtitulo {
            padding-left: 15px;
            color: #00376f;
            font-size: 0.8rem;
        }
    </style>
</head>

<body style="color: black;font-size:1rem;">
    <table style="width: 100%">
        <tr>
            <td
                style=" width: 20%; border-radius: 30px; border-left: black 1px; border-top: black 1px;  border-bottom: black 1px; padding-left: 20px">
                <img src="{{ asset('/assets/img/logo.png') }}" class="logo" style="margin-right: 20px">
            </td>
            <td
                style=" width: 40%; line-height: 16px; border-radius: 30px; border-right: black 1px; border-top: black 1px;  border-bottom: black 1px;">
                NIT. 890.208.316-6 <br>
                Cll. 31A No. 26-15<br>
                Centro Empresarial La Florida Of. 504<br>
                PBX. 6384935 Emergencias 164<br>
                E-mail: metrogas@metrogassaesp.com<br>
                FLORIDABLANCA-SANTANDER
            </td>
            <td style=" border: black 1px; text-align: right; padding-left: 20px; padding-right: 10px;">
                LISTA DE CHEQUEO PREOPERACIONAL DE
                CARROS DIARIOS Y/O DESPLAZAMIENTO F-HSEQ-07 V_7
            </td>
        </tr>
    </table>

    <h2 style="text-align: center; font-size: 1.2rem">LISTA DE CHEQUEO PREOPERACIONAL DE
        CARROS DIARIOS Y/O DESPLAZAMIENTO F-HSEQ-07 V_7</h2>

    <br>
    <table style="width: 100%">
        <tr>
            <td>
                <b>INFORMACIÓN DEL SOLICITANTE</b>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 30%; padding-left: 15px">
                <b>Correo Electronico:</b>
            </td>
            <td colspan="3">
                {{ $object->correo }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 15px">
                <b>Nombres Completos:</b>
            </td>
            <td colspan="3">
                {{ $object->nombre_completo }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 15px">
                <b>Centro Operativo:</b>
            </td>
            <td>
                {{ $object->lugar_trabajo }}
            </td>
            <td>
                <b>Número de Cedula:</b>
            </td>
            <td>
                {{ $object->cedula }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 15px">
                <b>Area:</b>
            </td>
            <td>
                {{ $object->area }}
            </td>
            <td>
                <b>Cargo:</b>
            </td>
            <td>
                {{ $object->cargo }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 15px">
                <b>Placas Vehiculo:</b>
            </td>
            <td>
                {{ $object->placa_vehiculo }}
            </td>
            <td>
                <b>Modelo:</b>
            </td>
            <td>
                {{ $object->modelo }}
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%">
        <tr>
            <td>
                <b>INFORMACIÓN VEHICULO</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td style="padding-left: 15px">
                <b>Kilometraje inicio de la
                    jornada:</b>
            </td>
            <td>
                {{ $object->kilometraje_inicio_jornada }}
            </td>
            <td>
                <b>Niveles de Aceite:</b>
            </td>
            <td>
                @foreach ($ENivelAceite as $Enum)
                    @if ($Enum->getId() == $object->niveles_aceite)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

    </table>

    <br>
    <table style="width: 100%">
        <tr>
            <td>
                <b>LUCES</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>1. Luces retroceso y
                    parqueo</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->luces_retroceso_parqueo)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>2. Luces altas y bajas</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->luces_altas_bajas)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach

            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>3. Direccionales delanteras,
                    parqueo y giro</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->direccionales_delanteras)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach

            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>4. Direccionales traseras,
                    parqueo y giro</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->direccionales_traseras)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach

            </td>
        </tr>

    </table>


    <table style="width: 100%">
        <tr>
            <td>
                <b>SISTEMA DE ADVERTENCIA</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>5.Pito o Bocina</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->pito_bocina)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

    </table>

    <table style="width: 100%">
        <tr>
            <td>
                <b>CABINA</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>7. Espejos central y
                    laterales</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->espejos_centrales_laterales)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="subtitulo">
                <b>8. Puertas de Acceso al
                    Vehículo</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->puertas_acceso_vehiculo)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="subtitulo">
                <b>9. El Vidrio frontal</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->vidrio_frontal)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="subtitulo">
                <b>10. Vidrios laterales y
                    trasero</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->vidrios_laterales_trasero)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>11. Indicadores(hidráulico,
                    velocímetro, temperatura, combustible) son funcionales</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->indicadores)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>



    </table>


    <table style="width: 100%">
        <tr>
            <td>
                <b>LLANTAS</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>12. Todas las ruedas tienen sus
                    espárragos completos</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->llantas_esparragos)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>13. Están en buen estado sin
                    cortaduras profundas, ni abultamientos</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->rudas_buen_estado)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>14. La llanta de repuesto y
                    equipo para cambio de llantas existen y están en buen
                    estado</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->llanta_repuesto)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>15. Presión de inflado de las
                    llantas es adecuada(Revisión visual)</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->presion)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
    </table>


    <table style="width: 100%">
        <tr>
            <td>
                <b>CONDICIONES MECÁNICAS</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>16. Caja de cambios</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->caja_cambios)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="subtitulo">
                <b>17. Los pedales (acelerador,
                    freno, cloche)</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->pedales)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="subtitulo">
                <b>18. Latas y pintura</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->latas_pintura)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="subtitulo">
                <b>19. Freno de emergencia</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->freno_emergencia)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>20. Buen nivel de fluidos,
                    hidráulico, refrigerante, dirección, frenos y agua
                    batería</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->nivel_fluidos)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>



    </table>





    <table style="width: 100%">
        <tr>
            <td>
                <b>Equipo de prevención y seguridad (Kit carretera) Articulo 30
                    Código Nacional de Tránsito</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>21. Conos reflectivos</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->conos_reflectivos)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>22. Gato con capacidad para
                    elevar el vehículo.</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->gato)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>23. Linterna</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->linterna)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>24. Cruceta</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->cruceta)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>25. Dos señales de carretera en
                    forma de triángulo en material reflectivo y provistas de
                    soportes para ser colocadas en forma vertical o lámparas de
                    señal de luz amarilla intermitentes o de destello</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->senales)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>26. Dos tacos para bloquear el
                    vehículo.</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->tacos)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>27. La Caja de herramienta básica
                    como mínimo contiene: Alicate, destornilladores, llave de
                    expansión y llaves fijas</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->caja_herramienta)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>28. Llanta de repuesto</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->llantas_repuesto)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>


    </table>

    <table style="width: 100%">
        <tr>
            <td>
                <b>VIGENCIA DE LOS SIGUIENTES ELEMENTOS</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>29. Extintor vigente y en buen
                    estado</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->extintor)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>30. Botiquín con todos los
                    elementos vigentes y en buen estado</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->botiquin)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
      

    </table>

    <table style="width: 100%">
        <tr>
            <td>
                <b>DOCUMENTOS LEGALES VIGENTES</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>31. SOAT</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->soat)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>32. RTM (revisión técnico
                    mecánica)</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->rtm)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>33. Licencia de
                    conducción</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->licencia_conduccion)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>34. Tarjeta de
                    propiedad</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->tarjeta_propuedad)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>

    </table>

    <table style="width: 100%">
        <tr>
            <td>
                <b>OTROS</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo" style="width: 300px">
                <b>Observaciones: En este espacio
                    describa el numeral con los hallazgos o si ha realizado
                    mantenimiento a su motocicleta (Anexe registro de
                    mantenimiento)</b>
            </td>
            <td>
                {{ $object->observacion }}
            </td>
        </tr>
        {{--  <tr>
            <td class="subtitulo">
                <b>Fotografía del tacómetro (con
                    fecha y hora)</b>
            </td>
            <td>
                {{ $object->fotografia_tacometro }}
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>Fotografía de mantenimiento
                    (cada
                    vez que se realice)</b>
            </td>
            <td>
                {{ $object->fotografia_mantenimiento }}
            </td>
        </tr> --}}
        <tr>
            <td class="subtitulo">
                <b>He diligenciado personalmente
                    el
                    documento de inspección preoperacional</b>
            </td>
            <td>
                {{ $object->ha_diligenciado_ud_mismo }}
            </td>
        </tr>
    </table>

</body>

</html>
