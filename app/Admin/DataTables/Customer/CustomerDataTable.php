<?php

namespace App\Admin\DataTables\Customer;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Customer\CustomerRepositoryInterface;
use App\Enums\Customer\CustomerType;

use function PHPSTORM_META\type;

class CustomerDataTable extends BaseDataTable
{

    protected $nameTable = 'customerTable';

    public function __construct(
        CustomerRepositoryInterface $repository
    ) {
        $this->repository = $repository;

        parent::__construct();

    }

    public function setView()
    {
        $this->view = [
            'action' => 'admin.customers.datatable.action',
            'edit_link' => 'admin.customers.datatable.edit-link',
            'type' => 'admin.customers.datatable.type',
        ];
    }

    public function setColumnSearch()
    {

        $this->columnAllSearch = [0, 1, 2, 3, 4];

        $this->columnSearchDate = [4];

        $this->columnSearchSelect = [
            [
                'column' => 2,
                'data' => CustomerType::asSelectArray(),
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
        return $this->repository->getQueryBuilderOrderBy();
    }

    protected function setCustomColumns()
    {
        $this->customColumns = config('datatables_columns.customer', []);

    }

    protected function setCustomEditColumns()
    {
        $this->customEditColumns = [
            'fullname' => $this->view['edit_link'],
            'type' => $this->view['type'],
            'created_at' => '{{ format_date($created_at) }}'
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
        $this->customRawColumns = ['fullname', 'action', 'type'];
    }
}