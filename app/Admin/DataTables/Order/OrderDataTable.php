<?php

namespace App\Admin\DataTables\Order;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderType;

class OrderDataTable extends BaseDataTable
{

    protected $nameTable = 'orderTable';

    protected $repoDriver;

    public function __construct(
        OrderRepositoryInterface $repository,
        AdminRepositoryInterface $repoDriver
    ) {
        $this->repository = $repository;
        $this->repoDriver = $repoDriver;

        parent::__construct();
    }

    public function setView()
    {
        $this->view = [
            'action' => 'admin.orders.datatable.action',
            'edit_link' => 'admin.orders.datatable.edit-link',
            'status' => 'admin.orders.datatable.status',
            'type' => 'admin.orders.datatable.type',
            'receiver' => 'admin.orders.datatable.receiver',
            'checkbox' => 'admin.orders.datatable.checkbox',
            'driver' => 'admin.orders.datatable.driver',
        ];
    }

    public function setColumnSearch()
    {

        $this->columnAllSearch = [1, 2, 3, 4, 5, 8, 9];

        $this->columnSearchDate = [9];

        $this->columnSearchSelect = [
            [
                'column' => 8,
                'data' => OrderStatus::asSelectArray(),
            ],
            [
                'column' => 2,
                'data' => OrderType::asSelectArray(),
            ],
        ];
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $auth = auth('admin')->user();

        if ($auth->isDriver()) {

            return $this->repository->getByQueryBuilder([
                'driver_id' => $auth->id,
                'parent_id' => null
            ], ['sender', 'receiver']);
        } else {
            return $this->repository->getByQueryBuilder(['parent_id' => null], ['sender', 'receiver', 'driver']);
        }
    }
    protected function setCustomColumns()
    {
        $this->customColumns = config('datatables_columns.order', []);
    }

    protected function setCustomEditColumns()
    {
        $this->customEditColumns = [
            'id' => $this->view['edit_link'],
            'status' => $this->view['status'],
            'type' => $this->view['type'],
            'customer_receiver_id' => $this->view['receiver'],
            'fee' => '{{format_price($fee)}}',
            'driver_id' => $this->view['driver'],
            'created_at' => '{{ format_date($created_at) }}',
            'checkbox' => $this->view['checkbox'],
        ];
    }

    protected function setCustomFilterColumns()
    {
        $this->customFilterColumns = [
            'customer_receiver_id' => function ($query, $keyword) {
                $query->whereHas('receiver', function ($q) use ($keyword) {
                    $q->where('fullname', 'LIKE', "%{$keyword}%");
                });
            },
            'driver_id' => function ($query, $keyword) {
                $query->whereHas('driver', function ($q) use ($keyword) {
                    $q->where('fullname', 'LIKE', "%{$keyword}%");
                });
            },
            'id' => function ($query, $keyword) {
                $key = (int) $keyword;
                $query->where('id', 'LIKE', "%{$key}%");
            },
        ];
    }

    protected function setCustomAddColumns()
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns()
    {
        $this->customRawColumns = ['checkbox', 'id', 'action', 'status', 'customer_receiver_id', 'type', 'driver_id'];
    }
}