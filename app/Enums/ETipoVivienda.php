<?php

namespace App\Enums;


enum ETipoVivienda
{
    case PROPIA;
    case ARRENDADA;
    case FAMILIAR;

    public function getId(): int
    {
        return match ($this) {
            ETipoVivienda::PROPIA => 1,
            ETipoVivienda::ARRENDADA => 2,
            ETipoVivienda::FAMILIAR => 3,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ETipoVivienda::PROPIA => 'Propia',
            ETipoVivienda::ARRENDADA => 'Arrendada',
            ETipoVivienda::FAMILIAR => 'Familiar',
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
