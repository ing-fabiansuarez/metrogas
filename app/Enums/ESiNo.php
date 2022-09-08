<?php

namespace App\Enums;


enum ESiNo
{
    case NO;
    case SI;

    public function getId(): int
    {
        return match ($this) {
            ESiNo::NO => 0,
            ESiNo::SI => 1,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ESiNo::NO => 'NO',
            ESiNo::SI => 'SI',
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
