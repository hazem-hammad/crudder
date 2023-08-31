<?php

namespace App\Enums;

enum ActivationType: int
{
    case ACTIVE = 1;

    case IN_ACTIVE = 0;

    public function getActivationStatus(): string
    {
        return match ($this) {
            self::ACTIVE => 'active',
            self::IN_ACTIVE => 'inactive',
        };
    }
}
