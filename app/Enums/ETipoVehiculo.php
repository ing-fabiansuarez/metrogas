<?php

namespace App\Enums;


enum ETipoVehiculo
{
    case MOTO;
    case CARRO;

    public function getId(): int
    {
        return match ($this) {
            ETipoVehiculo::MOTO => 1,
            ETipoVehiculo::CARRO => 2,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ETipoVehiculo::MOTO => 'MOTOCICLETA',
            ETipoVehiculo::CARRO => 'CARRO',
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

    public static function exist($id)
    {
        foreach (self::cases() as $caso) {
            if ($caso->getId() == $id) {
                return true;
            }
        }
        return false;
    }
}
