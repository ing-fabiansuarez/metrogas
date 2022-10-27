<?php

namespace App\Enums;


enum EBuenoMalo
{
    case BUENO;
    case MALO;

    public function getId(): int
    {
        return match ($this) {
            EBuenoMalo::BUENO => 1,
            EBuenoMalo::MALO => 2,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EBuenoMalo::BUENO => 'BUENO',
            EBuenoMalo::MALO => 'MALO',
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
