<span @class([ 'badge' , \App\Enums\Order\PaymentStatus::tryFrom($type)->badge()
    ])>{{ \App\Enums\Order\PaymentStatus::getDescription($type) }}</span>