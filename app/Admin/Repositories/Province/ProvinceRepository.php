<?php

namespace App\Admin\Repositories\Province;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Province\ProvinceRepositoryInterface;
use App\Models\Province;

class ProvinceRepository extends EloquentRepository implements ProvinceRepositoryInterface
{
    public function getModel(){
        return Province::class;
    }

    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10){

        $this->instance = $this->model->where('name', 'like', "%{$keySearch}%");

        $this->applyFilters($meta);

        return $this->instance->limit($limit)->get();
    }
}