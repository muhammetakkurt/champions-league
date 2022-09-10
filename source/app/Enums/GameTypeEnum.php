<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum GameTypeEnum: string
{
    use EnumToArrayTrait;

    case HOME = 'home';
    case AWAY = 'away';
    case DRAWN = 'drawn';
}
