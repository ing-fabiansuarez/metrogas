<?php

namespace App\Enums;

use App\Enums\IEnum;

enum EStateRequest implements IEnum
{
    case CREATED;

    public function getId(): int
    {
        return match ($this) {
            EStateRequest::CREATED => 1,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            EStateRequest::CREATED => 'CREADO',
        };
    }
}
