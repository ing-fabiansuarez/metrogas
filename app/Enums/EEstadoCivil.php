<?php

namespace App\Enums;


enum EEstadoCivil
{
    case SOLTERO;
    case CASADO;
    case DIVORSIADO;
    case U_LIBRE;
    case VIUDO;

    public function getId(): int
    {
        return match ($this) {
            EEstadoCivil::SOLTERO => 1,
            EEstadoCivil::CASADO => 2,
            EEstadoCivil::DIVORSIADO => 3,
            EEstadoCivil::U_LIBRE => 4,
            EEstadoCivil::VIUDO => 5,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EEstadoCivil::SOLTERO => 'Soltero',
            EEstadoCivil::CASADO => 'Casado',
            EEstadoCivil::DIVORSIADO => 'Divorsiado',
            EEstadoCivil::U_LIBRE => 'U. Libre',
            EEstadoCivil::VIUDO => 'Viudo'
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
