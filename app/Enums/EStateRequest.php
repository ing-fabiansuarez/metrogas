<?php

namespace App\Enums;

use App\Enums\IEnum;

enum EStateRequest
{
    case CREATED;
    case APROVED;

    public function getId(): int
    {
        return match ($this) {
            EStateRequest::CREATED => 1,
            EStateRequest::APROVED => 2,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateRequest::CREATED => 'PENDIENTE APROBACION',
            EStateRequest::APROVED => 'APROBADO JEFE INM.',
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
