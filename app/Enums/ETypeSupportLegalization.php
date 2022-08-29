<?php

namespace App\Enums;


enum ETypeSupportLegalization
{
    case SUPPORT_PAGO;

    public function getId(): int
    {
        return match ($this) {
            ETypeSupportLegalization::SUPPORT_PAGO => 1,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ETypeSupportLegalization::SUPPORT_PAGO => 'SOPORTE DE PAGO',
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
