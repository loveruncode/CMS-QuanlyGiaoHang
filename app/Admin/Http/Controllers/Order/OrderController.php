<?php

namespace App\Admin\Http\Controllers\Order;

use App\Admin\DataTables\Order\OrderDataTable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Order\OrderRequest;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\Customer\CustomerRepositoryInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Admin\Services\Order\OrderService;
use App\Enums\Order\{OrderStatus, OrderType, PaymentMethod, PaymentStatus};
use Illuminate\Http\Request;
use App\Enums\Admin\AdminRoles;


class OrderController extends Controller
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
            'index' => 'admin.orders.index',
            'create' => 'admin.orders.create',
            'edit' => 'admin.orders.edit',
            'merge-edit' => 'admin.orders.merge.merge-edit',
            'getSenderCustomer' => 'admin.orders.info-customer-sender',
            'getReceiverCustomer' => 'admin.orders.info-customer-receiver',
            'getOrder' => 'admin.orders.info-order',
        ];
    }

    public function getRoute()
    {

        return [
            'index' => 'admin.order.index',
            'create' => 'admin.order.create',
            'edit' => 'admin.order.edit',
            'delete' => 'admin.order.delete',
            'mergeDelete' => 'admin.order.mergeDelete',
            'merge-edit' => 'admin.order.mergeEdit',
        ];
    }
    public function index(OrderDataTable $dataTable)
    {
        $orders = $this->repoAdmin->getAll();
        $actionMultiple['delete'] = __('delete');
        return $dataTable->render($this->view['index'], [
            'orders' => $orders,
            'actionMultiple' => $actionMultiple,
            'breadcrums' => $this->crums->add(__('order'))
        ]);
    }

    public function create()
    {
        return view($this->view['create'], [
            'type' => OrderType::asSelectArray(),
            'payment_status' => PaymentStatus::asSelectArray(),
            'payment_method' => PaymentMethod::asSelectArray(),
            'status' => OrderStatus::asSelectArray(),
            'breadcrums' => $this->crums->add(__('order'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(OrderRequest $request)
    {

        $instance = $this->service->store($request);

        if ($instance) {
            return to_route($this->route['edit'], $instance->id);
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id)
    {
        $order = $this->repository->findOrFail($id);

        $similars = $this->repository->getSimilarOrdersAfter($order);

        return view(
            $this->view['edit'],
            [
                'order' => $order,
                'similars' => $similars,
                'type' => OrderType::asSelectArray(),
                'payment_status' => PaymentStatus::asSelectArray(),
                'payment_method' => PaymentMethod::asSelectArray(),
                'status' => OrderStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('order'), route($this->route['index']))->add(__('edit'))
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
    public function mergeEdit($id)
    {

        $admins = $this->repoAdmin->getAll();
        $order = $this->repository->findOrFail($id);
        $dataAll = $this->repository->getAll();
        $similarOrders = $this->repository->getSimilarOrders($order);

        $similarOrders = $similarOrders->filter(function ($similarOrder) {
            return $similarOrder->type === OrderType::Normal;
        });

        if ($similarOrders->isEmpty()) {
            return back()->with('error', __('Không có đơn hàng nào để gộp'));
        }

        return view(
            $this->view['merge-edit'],
            [
                'order' => $order,
                'dataAll' => $dataAll,
                'similarOrders' => $similarOrders,
                'admins' => $admins,
                'type' => OrderType::asSelectArray(),
                'payment_status' => PaymentStatus::asSelectArray(),
                'payment_method' => PaymentMethod::asSelectArray(),
                'status' => OrderStatus::asSelectArray(),
                'breadcrums' => $this->crums->add(__('order'), route($this->route['index']))->add(__('merge'))
            ],
        );
    }
    public function merge(OrderRequest $request)
    {
        $respone = $this->service->merge($request);

        if ($respone) {
            return to_route($this->route['edit'], $respone->id);
        }

        return back()->with('error', __('notifyFail'));
    }

    public function delete($id)
    {
        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
    public function getSenderCustomer($id)
    {
        // dd($id);
        $customer = $this->repoCustomer->findOrFail($id);
        return view($this->view['getSenderCustomer'], [
            'customer' => $customer,
        ]);
    }
    public function getReceiverCustomer($id)
    {
        // dd($id);
        $customer = $this->repoCustomer->findOrFail($id);
        return view($this->view['getReceiverCustomer'], [
            'customer' => $customer,
        ]);
    }

    public function getOrder($id)
    {
        // dd($id);
        $orders = $this->repository->findOrFail($id);
        return view($this->view['getOrder'], [
            'orders' => $orders,
        ]);
    }

    public function actionMultipleRecode(Request $request)
    {

        $respone = $this->service->actionMultipleRecode($request);

        if ($respone) {

            return $respone;
        }

        return back()->with('error', __('notifyFail'));
    }
}