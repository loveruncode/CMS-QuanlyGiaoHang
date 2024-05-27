<?php

namespace App\Admin\Http\Controllers\Order;

use App\Admin\DataTables\Order\DriverDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Order\OrderRequest;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\Customer\CustomerRepositoryInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Admin\Services\Order\OrderService;
use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderType;
use App\Enums\Order\PaymentMethod;
use App\Enums\Order\PaymentStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Enums\Admin\AdminRoles;



class DriverController extends Controller
{
    protected $repoCustomer;
    protected $repoAdmin;
    //
    public function __construct(
        OrderRepositoryInterface $repository,
        OrderService $service,
        CustomerRepositoryInterface $repoCustomer,
        AdminRepositoryInterface $repoAdmin,
    ) {

        parent::__construct();

        $this->repository = $repository;
        $this->repoAdmin = $repoAdmin;
        $this->repoCustomer = $repoCustomer;

        $this->service = $service;
    }

    public function getView()
    {

        return [
            'index' => 'admin.orders.drivers.index',
            'create' => 'admin.orders.drivers.create',
            'edit' => 'admin.orders.drivers.edit',
            'getSenderCustomer' => 'admin.orders.drivers.info-customer-sender',
            'getReceiverCustomer' => 'admin.orders.drivers.info-customer-receiver',
        ];
    }

    public function getRoute()
    {

        return [
            'index' => 'admin.driver.index',
            'create' => 'admin.driver.create',
            'edit' => 'admin.driver.edit',
        ];
    }
    public function index(DriverDataTable $dataTable)
    {

        $loggedInAdmin = Auth::guard('admin')->user()->id;
        // $orders = Order::where('driver_id', $loggedInAdmin)->get();

        if (Auth::guard('admin')->user()->isDriver()) {
            $orders = Order::where('driver_id', $loggedInAdmin)->get();
        } else {
            $orders = Order::all();
        }
        return $dataTable->render($this->view['index'], [
            'orders' => $orders,
            'breadcrums' => $this->crums->add(__('orderDriver'))
        ]);
    }

    public function edit($id)
    {
        $admins = $this->repoAdmin->searchAllLimit('', ['roles' => AdminRoles::Driver]);
        $order = $this->repository->findOrFail($id);

        $similars = $this->repository->getSimilarOrdersAfter($order);


        return view(
            $this->view['edit'],
            [
                'order' => $order,
                'similars' => $similars,
                'admins' => $admins,
                'type' => OrderType::asSelectArray(),
                'payment_status' => PaymentStatus::asSelectArray(),
                'payment_method' => PaymentMethod::asSelectArray(),
                'status' => OrderStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('orderDriver'), route($this->route['index']))->add(__('updateOrder'))
            ],
        );
    }

    public function update(OrderRequest $request)
    {
        $respone = $this->service->update($request);

        if ($respone) {
            return back()->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'));
    }

    public function getSenderCustomer($id)
    {
        $customer = $this->repoCustomer->findOrFail($id);
        return view($this->view['getSenderCustomer'], [
            'customer' => $customer,
        ]);
    }
    public function getReceiverCustomer($id)
    {
        $customer = $this->repoCustomer->findOrFail($id);
        return view($this->view['getReceiverCustomer'], [
            'customer' => $customer,
        ]);
    }
}