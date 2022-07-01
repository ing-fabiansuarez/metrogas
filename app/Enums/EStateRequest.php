<?php

namespace App\Enums;

use App\Enums\IEnum;

enum EStateRequest
{
    case CREATED;
    case APROVED;
    case ACCEPTED_EMPLOYEE;

    public function getId(): int
    {
        return match ($this) {
            EStateRequest::CREATED => 1,
            EStateRequest::APROVED => 2,
            EStateRequest::ACCEPTED_EMPLOYEE => 3
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateRequest::CREATED => 'PENDIENTE APROBACION',
            EStateRequest::APROVED => 'APROBADO JEFE INM.',
            EStateRequest::ACCEPTED_EMPLOYEE => 'ACEPTACION DEL EMPLEADO',
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
