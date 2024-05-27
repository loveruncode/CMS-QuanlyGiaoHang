<span @class([ 'badge' , \App\Enums\Order\OrderStatus::tryFrom($type)->badge()
    ])>{{ \App\Enums\Order\OrderStatus::getDescription($type) }}</span>