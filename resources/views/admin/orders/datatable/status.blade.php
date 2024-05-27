<span @class([ 'badge' , \App\Enums\Order\OrderStatus::tryFrom($status)->badge()
    ])>{{ \App\Enums\Order\OrderStatus::getDescription($status) }}</span>