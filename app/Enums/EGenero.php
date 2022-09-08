<?php

namespace App\Enums;


enum EGenero
{
    case MASCULINO;
    case FEMENINO;
    case OTROS;

    public function getId(): int
    {
        return match ($this) {
            EGenero::MASCULINO => 1,
            EGenero::FEMENINO => 2,
            EGenero::OTROS => 3,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EGenero::MASCULINO => 'Masculino',
            EGenero::FEMENINO => 'Femenino',
            EGenero::OTROS => 'Otros',
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
