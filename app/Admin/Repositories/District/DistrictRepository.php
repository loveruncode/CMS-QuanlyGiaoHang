<?php

namespace App\Admin\Repositories\District;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\District\DistrictRepositoryInterface;
use App\Models\District;

class DistrictRepository extends EloquentRepository implements DistrictRepositoryInterface
{
    public function getModel(){
        return District::class;
    }

    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10){

        $this->instance = $this->model->where('name', 'like', "%{$keySearch}%");
        
        $this->applyFilters($meta);

        return $this->instance->limit($limit)->get();
    }
}