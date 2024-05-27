<?php

namespace App\Enums\Setting;

use App\Supports\Enum;

enum SettingGroup: int
{
    use Enum;

    case General = 1;
    case Bank = 2;
    case SocialNetwork = 3;
    case Introduction = 4;
}
