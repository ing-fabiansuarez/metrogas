<?php

namespace App\Enums;


enum ETipoEmpresa
{
    case PRIVADA;
    case PUBLICA;
    case MIXTA;

    public function getId(): int
    {
        return match ($this) {
            ETipoEmpresa::PRIVADA => 1,
            ETipoEmpresa::PUBLICA => 2,
            ETipoEmpresa::MIXTA => 3,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ETipoEmpresa::PRIVADA => 'Privada',
            ETipoEmpresa::PUBLICA => 'Publica',
            ETipoEmpresa::MIXTA => 'Mixta',
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
