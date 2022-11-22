<?php

namespace App\Enums;


enum EActivoInactivo
{
    case ACTIVO;
    case INACTIVO;

    public function getId(): int
    {
        return match ($this) {
            EActivoInactivo::ACTIVO => 1,
            EActivoInactivo::INACTIVO => 0,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EActivoInactivo::ACTIVO => 'ACTIVO',
            EActivoInactivo::INACTIVO => 'INACTIVO',
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
