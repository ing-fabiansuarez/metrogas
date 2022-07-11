<?php

namespace App\Enums;


enum EStateLegalization
{
    case CREATED;
    case SEND;

    public function getId(): int
    {
        return match ($this) {
            EStateLegalization::CREATED => 1,
            EStateLegalization::SEND => 2,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateLegalization::CREATED => 'CREADO',
            EStateLegalization::SEND => 'ENVIADO',
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
