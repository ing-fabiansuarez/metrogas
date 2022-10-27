<?php

namespace App\Enums;


enum ENivelAceite
{
    case MAXIMO;
    case MINIMO;

    public function getId(): int
    {
        return match ($this) {
            ENivelAceite::MAXIMO => 1,
            ENivelAceite::MINIMO => 2,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ENivelAceite::MAXIMO => 'MAXIMO',
            ENivelAceite::MINIMO => 'MINIMO',
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
