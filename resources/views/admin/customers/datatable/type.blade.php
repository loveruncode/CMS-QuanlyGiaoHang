<span @class([ 'badge' , \App\Enums\Customer\CustomerType::tryFrom($type)->badge()
    ])>{{ \App\Enums\Customer\CustomerType::getDescription($type) }}</span>