<?php

namespace App\Enums;


enum EStateLegalization
{
    case CREATED;
    case SEND;
    case APROVE_BOSS;
    case CANCELED;
    case APROVE_GENERAL;
    case APROVE_CONTABILIDAD;
    case CHECKED;

    public function getId(): int
    {
        return match ($this) {
            EStateLegalization::CREATED => 1,
            EStateLegalization::SEND => 2,
            EStateLegalization::APROVE_BOSS => 3,
            EStateLegalization::CANCELED => 4,
            EStateLegalization::APROVE_GENERAL => 5,
            EStateLegalization::APROVE_CONTABILIDAD => 6,
            EStateLegalization::CHECKED => 7,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateLegalization::CREATED => 'CREADO',
            EStateLegalization::SEND => 'ENVIADO',
            EStateLegalization::APROVE_BOSS => 'APROBADO JEFE',
            EStateLegalization::CANCELED => 'ANULADA',
            EStateLegalization::APROVE_GENERAL => 'APROBADA POR FINANCIERA',
            EStateLegalization::APROVE_CONTABILIDAD => 'COMPLETA',
            EStateLegalization::CHECKED => 'VERIFICADA JEFE FINANCIERO',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            EStateLegalization::CREATED => 'bg-gradient-info',
            EStateLegalization::SEND => 'bg-gradient-warning',
            EStateLegalization::APROVE_BOSS => 'badge bg-gradient-light',
            EStateLegalization::CANCELED => 'bg-gradient-danger',
            EStateLegalization::APROVE_GENERAL => 'bg-gradient-warning',
            EStateLegalization::APROVE_CONTABILIDAD => 'bg-gradient-success',
            EStateLegalization::CHECKED => 'badge bg-gradient-light',
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
