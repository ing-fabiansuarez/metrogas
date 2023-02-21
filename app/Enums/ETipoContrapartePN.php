<?php

namespace App\Enums;


enum ETipoContrapartePN
{
    case EMPLEADO;
    case PROVEEDOR;
    case CONTRATISTA;
    case ACCIONISTA;

    public function getId(): int
    {
        return match ($this) {
            ETipoContrapartePN::EMPLEADO => 0,
            ETipoContrapartePN::PROVEEDOR => 1,
            ETipoContrapartePN::CONTRATISTA => 2,
            ETipoContrapartePN::ACCIONISTA => 3,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            ETipoContrapartePN::EMPLEADO => 'EMPLEADO',
            ETipoContrapartePN::PROVEEDOR => 'PROVEEDOR',
            ETipoContrapartePN::CONTRATISTA => 'CONTRATISTA',
            ETipoContrapartePN::ACCIONISTA => 'ACCIONISTA',
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
