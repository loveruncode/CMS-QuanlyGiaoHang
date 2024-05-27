<?php

namespace App\Admin\Repositories\Order;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }
    public function getSimilarOrders(Order $order)
    {
        return Order::with('receiver')
            ->where('status', $order->status)
            ->where('customer_receiver_id', $order->customer_receiver_id)
            ->whereNull('parent_id')
            ->where('id', '!=', $order->id)
            ->get();
    }

    public function getSimilarOrdersAfter(Order $order)
    {
        return Order::with('receiver')
            ->where('status', $order->status)
            ->where('customer_receiver_id', $order->customer_receiver_id)
            ->where('parent_id', '=', $order->id)
            ->where('id', '!=', $order->id)
            ->get();
    }
    public function updateMultipleRecord(array $filter, array $data)
    {
        $this->getQueryBuilder();

        $this->applyFilters($filter);

        $this->instance = $this->instance->update($data);

        return $this->instance;
    }
}