<?php

namespace App\Admin\Http\Controllers\Receiver;

use App\Admin\Http\Controllers\BaseSearchSelectController;
use App\Admin\Http\Resources\Receiver\ReceiverSearchSelectResource;
use App\Admin\Repositories\Receiver\ReceiverRepositoryInterface;

class ReceiverSearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        ReceiverRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    protected function selectResponse()
    {
        $this->instance = [
            'results' => ReceiverSearchSelectResource::collection($this->instance)
        ];
    }
}