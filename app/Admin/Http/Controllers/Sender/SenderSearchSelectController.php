<?php

namespace App\Admin\Http\Controllers\Sender;

use App\Admin\Http\Resources\Sender\SenderSearchSelectResource;
use App\Admin\Repositories\Sender\SenderRepositoryInterface;
use App\Admin\Http\Controllers\BaseSearchSelectController;

class SenderSearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        SenderRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    protected function selectResponse()
    {
        $this->instance = [
            'results' => SenderSearchSelectResource::collection($this->instance)
        ];
    }
}