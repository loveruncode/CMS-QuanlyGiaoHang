<?php

namespace App\Admin\DataTables\Order;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderType;
use Illuminate\Support\Facades\Auth;

class DriverDataTable extends BaseDataTable
{

    protected $nameTable = 'driverTable';

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

            'edit_link' => 'admin.orders.drivers.datatable.edit-link',
            'status' => 'admin.orders.drivers.datatable.status',
            'receiver' => 'admin.orders.drivers.datatable.receiver',
            'checkbox' => 'admin.orders.drivers.datatable.checkbox',
            'type' => 'admin.orders.drivers.datatable.type',
        ];
    }

    public function setColumnSearch()
    {

        $this->columnAllSearch = [0, 1, 2, 3, 4, 5, 6, 7];

        $this->columnSearchDate = [7];

        $this->columnSearchSelect = [
            [
                'column' => 6,
                'data' => OrderStatus::asSelectArray(),
            ],
            [
                'column' => 1,
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
        $loggedInAdmin = Auth::guard('admin')->user()->id;
        if (Auth::guard('admin')->user()->isDriver()) {
            return $this->repository->getByQueryBuilder(['driver_id' => $loggedInAdmin, 'parent_id' => null], ['receiver']);
        } else {
            return $this->repository->getByQueryBuilder(['parent_id' => null], ['receiver']);
        }
    }

    protected function setCustomColumns()
    {
        $this->customColumns = config('datatables_columns.driver', []);
    }

    protected function setCustomEditColumns()
    {
        $this->customEditColumns = [
            'id' => $this->view['edit_link'],
            'status' => $this->view['status'],
            'type' => $this->view['type'],
            'customer_receiver_id' => $this->view['receiver'],
            'fee' => '{{format_price($fee)}}',
            'created_at' => '{{ format_date($created_at) }}',
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
            'id' => function ($query, $keyword) {
                $key = (int) $keyword;
                $query->where('id', 'LIKE', "%{$key}%");
            },
        ];
    }



    protected function setCustomRawColumns()
    {
        $this->customRawColumns = ['id', 'action', 'status', 'customer_receiver_id', 'type'];
    }
}