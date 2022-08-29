<?php

namespace App\Enums;

use App\Enums\IEnum;

enum EStateRequest
{
    case BY_CREATE;
    case CREATED;
    case APROVED;
    case ACCEPTED_EMPLOYEE;
    case APROVED_GENERAL;
    case CLOSE;
    case CANCELED;
    case UPLOADED_SUPPORTS_TESORERIA;
    case APROVED_TESORERIA;
    case PAGO_DIRECTOR;
    case PAGO_REALIZADO;


    public function getId(): int
    {
        return match ($this) {
            EStateRequest::BY_CREATE => 1,
            EStateRequest::CREATED => 2,
            EStateRequest::APROVED => 3,
            EStateRequest::ACCEPTED_EMPLOYEE => 4,
            EStateRequest::APROVED_GENERAL => 5,
            EStateRequest::CLOSE => 6,
            EStateRequest::CANCELED => 7,
            EStateRequest::UPLOADED_SUPPORTS_TESORERIA => 8,
            EStateRequest::APROVED_TESORERIA => 9,
            EStateRequest::PAGO_DIRECTOR => 10,
            EStateRequest::PAGO_REALIZADO => 11,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateRequest::BY_CREATE => 'RECHAZADA',
            EStateRequest::CREATED => 'PENDIENTE APROBACION',
            EStateRequest::APROVED => 'APROBADO JEFE INM.',
            EStateRequest::ACCEPTED_EMPLOYEE => 'FIRMADO POR EMPLEADO',
            EStateRequest::APROVED_GENERAL => 'APROBADO GENERAL',
            EStateRequest::CLOSE => 'COMPLETA',
            EStateRequest::CANCELED => 'ANULADA',
            EStateRequest::UPLOADED_SUPPORTS_TESORERIA => 'SUBIDOS LOS SOPORTES',
            EStateRequest::APROVED_TESORERIA => 'APROBADO TESORERIA',
            EStateRequest::PAGO_DIRECTOR => 'APROBADO DIRECTOR',
            EStateRequest::PAGO_REALIZADO => 'PAGO REALIZADO',
        };
    }
    public function getColor(): string
    {
        return match ($this) {
            EStateRequest::BY_CREATE => 'bg-gradient-warning',
            EStateRequest::CREATED => 'bg-gradient-light',
            EStateRequest::APROVED => 'bg-gradient-dark',
            EStateRequest::ACCEPTED_EMPLOYEE => 'bg-gradient-info',
            EStateRequest::APROVED_GENERAL => 'bg-gradient-warning',
            EStateRequest::CLOSE => 'bg-gradient-success',
            EStateRequest::CANCELED => 'bg-gradient-danger',
            EStateRequest::UPLOADED_SUPPORTS_TESORERIA => 'bg-gradient-info',
            EStateRequest::APROVED_TESORERIA => 'bg-gradient-light',
            EStateRequest::PAGO_DIRECTOR => 'bg-gradient-info',
            EStateRequest::PAGO_REALIZADO => 'bg-gradient-warning',
        };
    }

    public static function from($id)
    {
        foreach (self::cases() as $caso) {
            if ($caso->getId() == $id) {
                return $caso;
            }
        }
    }
}
