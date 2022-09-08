<?php

namespace App\Enums;


enum ETipoOcupacion
{
    case MENOR_DE_EDAD;
    case HOGAR;
    case EMPLEADO;
    case INDEPENDIENTE;
    case ESTUDIANTE;
    case JUBILADO;

    public function getId(): int
    {
        return match ($this) {
            ETipoOcupacion::MENOR_DE_EDAD => 1,
            ETipoOcupacion::HOGAR => 2,
            ETipoOcupacion::EMPLEADO => 3,
            ETipoOcupacion::INDEPENDIENTE => 4,
            ETipoOcupacion::ESTUDIANTE => 5,
            ETipoOcupacion::JUBILADO => 6,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ETipoOcupacion::MENOR_DE_EDAD => 'Menor de edad',
            ETipoOcupacion::HOGAR => 'Hogar',
            ETipoOcupacion::EMPLEADO => 'Empleado',
            ETipoOcupacion::INDEPENDIENTE => 'Independiente',
            ETipoOcupacion::ESTUDIANTE => 'Estudiante',
            ETipoOcupacion::JUBILADO => 'Jubilado',
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
