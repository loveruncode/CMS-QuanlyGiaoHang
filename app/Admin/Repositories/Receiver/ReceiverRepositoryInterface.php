<?php

namespace App\Admin\Repositories\Receiver;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface ReceiverRepositoryInterface extends EloquentRepositoryInterface
{
    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10);
}