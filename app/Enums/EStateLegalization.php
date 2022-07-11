<?php

namespace App\Enums;


enum EStateLegalization
{
    case CREATED;
    case SEND;
    case APROVE_BOSS;
    case CANCELED;
    case APROVE_GENERAL;

    public function getId(): int
    {
        return match ($this) {
            EStateLegalization::CREATED => 1,
            EStateLegalization::SEND => 2,
            EStateLegalization::APROVE_BOSS => 3,
            EStateLegalization::CANCELED => 4,
            EStateLegalization::APROVE_GENERAL => 5,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateLegalization::CREATED => 'CREADO',
            EStateLegalization::SEND => 'ENVIADO',
            EStateLegalization::APROVE_BOSS => 'APROBADO JEFE',
            EStateLegalization::CANCELED => 'ANULADA',
            EStateLegalization::APROVE_GENERAL => 'COMPLETA',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            EStateLegalization::CREATED => 'bg-gradient-info',
            EStateLegalization::SEND => 'bg-gradient-warning',
            EStateLegalization::APROVE_BOSS => 'badge bg-gradient-light',
            EStateLegalization::CANCELED => 'bg-gradient-danger',
            EStateLegalization::APROVE_GENERAL => 'bg-gradient-success',
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
