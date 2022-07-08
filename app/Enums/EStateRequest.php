<?php

namespace App\Enums;

use App\Enums\IEnum;

enum EStateRequest
{
    case CREATED;
    case APROVED;
    case ACCEPTED_EMPLOYEE;
    case APROVED_GENERAL;
    case CLOSE;
    case CANCELED;

    public function getId(): int
    {
        return match ($this) {
            EStateRequest::CREATED => 1,
            EStateRequest::APROVED => 2,
            EStateRequest::ACCEPTED_EMPLOYEE => 3,
            EStateRequest::APROVED_GENERAL => 4,
            EStateRequest::CLOSE => 5,
            EStateRequest::CANCELED => 6,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateRequest::CREATED => 'PENDIENTE APROBACION',
            EStateRequest::APROVED => 'APROBADO JEFE INM.',
            EStateRequest::ACCEPTED_EMPLOYEE => 'FIRMADO POR EMPLEADO',
            EStateRequest::APROVED_GENERAL => 'APROBADO GENERAL',
            EStateRequest::CLOSE => 'CERRADO',
            EStateRequest::CANCELED => 'CANCELADA'
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
