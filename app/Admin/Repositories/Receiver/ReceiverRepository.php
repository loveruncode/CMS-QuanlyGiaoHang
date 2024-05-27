<?php

namespace App\Admin\Repositories\Receiver;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Receiver\ReceiverRepositoryInterface;
use App\Models\Customer;

class ReceiverRepository extends EloquentRepository implements ReceiverRepositoryInterface
{
    public function getModel()
    {
        return Customer::class;
    }

    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10)
    {

        $this->instance = $this->model->where('fullname', 'like', "%{$keySearch}%");

        $this->applyFilters($meta);

        return $this->instance->limit($limit)->get();
    }
}