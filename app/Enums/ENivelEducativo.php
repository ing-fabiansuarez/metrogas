<?php

namespace App\Enums;


enum ENivelEducativo
{
    case PRIMARIA;
    case BACHILLER;
    case TECNICO;
    case PREGRADO;
    case POSTGRADO;

    public function getId(): int
    {
        return match ($this) {
            ENivelEducativo::PRIMARIA => 1,
            ENivelEducativo::BACHILLER => 2,
            ENivelEducativo::TECNICO => 3,
            ENivelEducativo::PREGRADO => 4,
            ENivelEducativo::POSTGRADO => 5,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ENivelEducativo::PRIMARIA => 'Primaria',
            ENivelEducativo::BACHILLER => 'Bachiller',
            ENivelEducativo::TECNICO => 'Tecnico',
            ENivelEducativo::PREGRADO => 'Pregrado',
            ENivelEducativo::POSTGRADO => 'Postgrado',
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
