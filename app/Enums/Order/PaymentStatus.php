<?php

namespace App\Enums\Order;

use App\Supports\Enum;

enum PaymentStatus: int
{
    use Enum;

    case UnPaid = 1;
    case WaitingConfirm = 2;
    case Paid = 3;
    case Cancelled = 4;

    public function badge(){
        return match($this) {
            PaymentStatus::UnPaid => 'bg-yellow',
            PaymentStatus::WaitingConfirm => 'bg-orange',
            PaymentStatus::Paid => 'bg-green',
            PaymentStatus::Cancelled => 'bg-red',
        };
    }
}