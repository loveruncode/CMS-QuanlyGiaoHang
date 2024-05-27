<?php

namespace App\Enums\Order;

use App\Supports\Enum;

enum PaymentMethod: int
{
    use Enum;

    case COD = 1;
    case BankTransfer = 2;
    case Online = 3;
}