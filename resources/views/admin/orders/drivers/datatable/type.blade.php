<span @class([ 'badge' , \App\Enums\Order\OrderType::tryFrom($type)->badge()
    ])>{{ \App\Enums\Order\OrderType::getDescription($type) }}</span>