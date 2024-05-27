<?php

namespace App\Admin\Services\Customer;

use App\Admin\Services\Customer\CustomerServiceInterface;
use App\Admin\Repositories\Customer\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerService implements CustomerServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(CustomerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();
        $this->data['admin_id'] = Auth::guard('admin')->user()->id;

        $customer = $this->repository->create($this->data);
        return $customer;
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();

        $customer = $this->repository->update($this->data['id'], $this->data);

        return $customer;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}