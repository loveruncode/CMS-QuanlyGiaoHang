<?php

namespace App\Enums\Customer;

use App\Supports\Enum;

enum CustomerType: int
{
    use Enum;

    case Debt = 1;
    case Cash = 2;

    public function badge(){
        return match($this) {
            CustomerType::Debt => 'bg-orange',
            CustomerType::Cash => 'bg-cyan',
        };
    }
}
