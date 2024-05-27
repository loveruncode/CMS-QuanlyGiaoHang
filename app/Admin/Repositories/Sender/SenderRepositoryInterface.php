<?php

namespace App\Admin\Repositories\Sender;

use App\Admin\Repositories\EloquentRepositoryInterface;

interface SenderRepositoryInterface extends EloquentRepositoryInterface
{
    public function searchAllLimit($keySearch = '', $meta = [], $limit = 10);
}