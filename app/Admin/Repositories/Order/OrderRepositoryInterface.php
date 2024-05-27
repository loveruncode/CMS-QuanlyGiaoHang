<?php

namespace App\Admin\Repositories\Order;

use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Order;

interface OrderRepositoryInterface extends EloquentRepositoryInterface
{
    public function getSimilarOrders(Order $order);
    public function getSimilarOrdersAfter(Order $order);
    public function updateMultipleRecord(array $filter, array $data);
}