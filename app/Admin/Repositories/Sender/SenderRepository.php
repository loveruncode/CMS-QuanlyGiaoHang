<?php

namespace App\Admin\Repositories\Sender;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Sender\SenderRepositoryInterface;
use App\Models\Customer;

class SenderRepository extends EloquentRepository implements SenderRepositoryInterface
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