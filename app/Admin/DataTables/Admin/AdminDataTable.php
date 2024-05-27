<?php

namespace App\Admin\DataTables\Admin;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;

class AdminDataTable extends BaseDataTable
{

    protected $nameTable = 'adminTable';

    public function __construct(
        AdminRepositoryInterface $repository
    ){
        $this->repository = $repository;

        parent::__construct();
    }

    public function setView(){
        $this->view = [
            'action' => 'admin.admins.datatable.action',
            'edit_link' => 'admin.admins.datatable.edit-link',
            'checkbox' => 'admin.admins.datatable.checkbox',
        ];
    }

    public function setColumnSearch(){

        $this->columnAllSearch = [1, 2, 3, 4, 5];
        $this->columnSearchDate = [5];

        $this->columnSearchSelect = [
            [
                'column' => 4,
                'data' => auth('admin')->user()->roles->asArraySelectListRolesAdminAfterCase()
            ],
        ];
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repository->getQueryBuilderFollowRole();
    }

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.admin', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'fullname' => $this->view['edit_link'],
            'roles' => function($admin){
                return $admin->roles->description();
            },
            'created_at' => '{{ date(config("custom.format.date"), strtotime($created_at)) }}',
            'checkbox' => $this->view['checkbox'],
        ];
    }

    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['checkbox', 'fullname', 'action'];
    }
}
