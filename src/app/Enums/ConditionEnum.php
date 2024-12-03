<?php

namespace App\Enums;

enum ConditionEnum: int
{
    case Good = 1;
    case Bad = 2;



    public function label(): string
    {
        return match ($this) {
            self::Good => '良品',
            self::Bad => '不良品',

        };
    }
}
