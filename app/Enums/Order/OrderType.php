<?php

namespace App\Enums\Order;

use App\Supports\Enum;

enum OrderType: int
{
    use Enum;

    case Normal = 1;
    case Group = 2;

    public function badge(){
        return match($this) {
            OrderType::Normal => 'bg-orange',
            OrderType::Group => 'bg-cyan',
        };
    }
}