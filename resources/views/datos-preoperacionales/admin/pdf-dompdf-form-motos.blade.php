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
                F-HSEQ-07 LISTA DE CHEQUEO PREOPERACIONAL DE MOTOCICLETAS Y/O DESPLAZAMIENTO V_7
            </td>
        </tr>
    </table>

    <h2 style="text-align: center; font-size: 1.2rem">F-HSEQ-07 LISTA DE CHEQUEO
        PREOPERACIONAL DE MOTOCICLETAS Y/O DESPLAZAMIENTO V_7</h2>

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
                <b>1. Luz Delantera</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->luz_delantera)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>2. Direccionales
                    Delanteros</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->direccionales_delantera)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach

            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>3. Direccionales
                    Traseros</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->direccionales_traseras)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach

            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>4. Stop</b>
            </td>
            <td>
                @foreach ($EBuenoMalo as $Enum)
                    @if ($Enum->getId() == $object->stop)
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
                <b>5. La Llanta delantera tiene
                    labrado y presión adecuada</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->presion_labrado_llanta_delantera)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>6. La Llanta trasera tiene
                    labrado y presión adecuada</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->presion_labrado_llanta_trasera)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>7. El Rin Delantero está en
                    buenas condiciones</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->rin_delantero)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>8. Rin Trasero está en buenas
                    condiciones</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->rin_trasero)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td>
                <b>VARIOS</b>
            </td>
        </tr>
    </table>


    <table style="width: 100%;">
        <tr>
            <td class="subtitulo">
                <b>10. Los testigos del
                    Tacómetro
                    son funcionales</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->testigos_tacometros)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>11. El Tanque de Gasolina
                    tiene
                    fugas o abolladuras</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->tanque_gasolina)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>12. El Cojín es ergonómico y
                    se
                    encuentra en buen estado</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->cojin_argonomico)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>13. Tiene la Placa en un
                    lugar
                    visible</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->placa_visible)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>14. La moto está
                    aseada</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->moto_aseada)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>15. Los comandos del
                    acelerador
                    están en buen estado</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->comandos_acelerador_buen_estado)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>16. Tiene buena holgura y
                    funciona el Freno Delantero</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->freno_delantero)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>17. Tiene buena holgura y
                    funciona el Freno Trasero</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->freno_trasero)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>18. La Relación está en
                    buenas
                    condiciones Revisar: Tensión y estado de piñones</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->relacion)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>19. La Suspensión está en
                    buen
                    estado</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->suspencion)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>20. Buen nivel de fluidos
                    Revisar: Nivel de aceite y liquido de frenos</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->niveles_fluidos)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>21. Dirección (Ajuste del
                    sistema)</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->direccion)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>22. El Pito es de moto y está
                    en
                    buenas condiciones</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->pito)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>23. Los Espejos Retrovisores
                    están en buen estado</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->espejos_retrovisores)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>24. Se dispone de Casco
                    Certificado con visera</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->casco_certificado)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach

            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>25. Se dispone de Chaleco o
                    uniforme reflectivo</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->chaleco)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>26. Se dispone de Coderas y
                    rodilleras para moto</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->coderas_rodilleras)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>27. Se dispone de Guantes de
                    moto</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->guantes)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>28. Esta en buen estado el
                    reposapies</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->reposapies)
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
                <b>26. SOAT</b>
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
                <b>27. RTM (revisión técnico
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
                <b>28. Licencia de
                    conducción</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->licencia_de_conduccion)
                        {{ $Enum->getName() }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="subtitulo">
                <b>29. Tarjeta de
                    propiedad</b>
            </td>
            <td>
                @foreach ($ESiNo as $Enum)
                    @if ($Enum->getId() == $object->tarjeta_de_propiedad)
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
                <b>Observaciones: En este
                    espacio
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
