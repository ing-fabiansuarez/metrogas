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
            EStateRequest::CANCELED => 'ANULADA'
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
            EStateRequest::CANCELED => 'bg-gradient-danger'
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
