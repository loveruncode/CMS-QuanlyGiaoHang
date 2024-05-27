<?php

namespace App\Admin\Repositories\Customer;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Customer\CustomerRepositoryInterface;
use App\Enums\Order\OrderStatus;
use App\Models\Customer;
use App\Models\Order;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryInterface
{
    public function getModel()
    {
        return Customer::class;
    }

    public function deleteCustomer(Customer $customer)
    {
        return Order::where(function ($query) use ($customer) {
            $query->where('customer_sender_id', $customer->id)
                ->orWhere('customer_receiver_id', $customer->id);
        })->exists();
    }
}