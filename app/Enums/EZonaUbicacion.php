<?php

namespace App\Enums;


enum EZonaUbicacion
{
    case RURAL;
    case URBANA;

    public function getId(): int
    {
        return match ($this) {
            EZonaUbicacion::URBANA => 1,
            EZonaUbicacion::RURAL => 2,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EZonaUbicacion::URBANA => 'Urbana',
            EZonaUbicacion::RURAL => 'Rural',
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
