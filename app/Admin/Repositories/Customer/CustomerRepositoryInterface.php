<?php

namespace App\Admin\Repositories\Customer;

use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Customer;
use App\Models\Order;

interface CustomerRepositoryInterface extends EloquentRepositoryInterface
{
    public function deleteCustomer(Customer $customer);
}