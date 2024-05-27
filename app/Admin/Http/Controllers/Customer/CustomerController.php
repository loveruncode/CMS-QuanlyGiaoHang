<?php

namespace App\Admin\Http\Controllers\Customer;

use App\Admin\DataTables\Customer\CustomerDataTable;
use App\Admin\Repositories\Customer\CustomerRepositoryInterface;
use App\Admin\Services\Customer\CustomerServiceInterface;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Customer\CustomerRequest;
use App\Enums\Customer\CustomerType;

class CustomerController extends Controller
{
    //
    public function __construct(
        CustomerRepositoryInterface $repository,
        CustomerServiceInterface $service
    ) {

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {

        return [
            'index' => 'admin.customers.index',
            'create' => 'admin.customers.create',
            'edit' => 'admin.customers.edit'
        ];
    }

    public function getRoute()
    {

        return [
            'index' => 'admin.customer.index',
            'create' => 'admin.customer.create',
            'edit' => 'admin.customer.edit',
            'delete' => 'admin.customer.delete'
        ];
    }
    public function index(CustomerDataTable $dataTable)
    {

        return $dataTable->render($this->view['index'], [
            'breadcrums' => $this->crums->add(__('customer'))
        ]);
    }

    public function create()
    {
        return view($this->view['create'], [
            'type' => CustomerType::asSelectArray(),
            'breadcrums' => $this->crums->add(__('customer'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(CustomerRequest $request)
    {
        $instance = $this->service->store($request);

        if ($instance) {
            return to_route($this->route['edit'], $instance->id);
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }


    public function edit($id)
    {
        $customer = $this->repository->findOrFail($id, ['province', 'district', 'ward']);
        return view(
            $this->view['edit'],
            [
                'customer' => $customer,
                'type' => CustomerType::asSelectArray(),
                'breadcrums' => $this->crums->add(__('customer'), route($this->route['index']))->add(__('edit'))
            ],
        );
    }

    public function update(CustomerRequest $request)
    {
        $respone = $this->service->update($request);

        if ($respone) {

            return back()->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'));

    }
    public function delete($id)
    {
        $customer = $this->repository->findOrFail($id);

        if ($this->repository->deleteCustomer($customer)) {
            return back()->with('error', __('notifyFail'));
        } else {
            $this->service->delete($id);
            return to_route($this->route['index'])->with('success', __('notifySuccess'));
        }
    }
}