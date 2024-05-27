<?php

namespace App\Admin\Services\Order;

use App\Admin\Services\Order\OrderServiceInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderType;
use App\Enums\Order\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {

        $this->data = $request->validated();
        $this->data['admin_id'] = Auth::guard('admin')->user()->id;
        $this->data['driver_id'] = $request->input('driver_id');
        $this->data['type'] = OrderType::Normal;
        $this->data['status'] = OrderStatus::Processing;
        $this->data['payment_status'] = PaymentStatus::UnPaid;
        $order = $this->repository->create($this->data);
        return $order;
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();

        $this->data['images'] = isset($this->data['images']) ? explode(",", $this->data['images']) : [];

        $order = $this->repository->update($this->data['id'], $this->data);


        return $order;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function actionMultipleRecode(Request $request)
    {

        if (!$request->input('id') || empty($request->input('id'))) {
            return false;
        }

        $data = $request->all();

        if ($data['action'] == 'delete') {

            foreach ($data['id'] as $id) {

                $this->delete($id);
            }

            return back()->with('success', __('notifySuccess'));
        }

        return false;
    }
    public function merge(Request $request)
    {
        $data = $request->validated();
        $data['weight'] = 0;
        $data['fee'] = 0;
        $data['total_amount'] = 0;


        $orderChildId = $request->input('idCheck');

        array_push($orderChildId, $request->input('id'));

        $orderChild = $this->repository->getby([
            ['id', 'in', $orderChildId],
            'type' => OrderType::Normal
        ]);
        $data['admin_id'] = $orderChild[0]->admin_id;
        $data['driver_id'] = $orderChild[0]->driver_id;
        $data['customer_receiver_id'] = $orderChild[0]->customer_receiver_id;

        foreach ($orderChild as $item) {

            $data['weight'] += $item->weight;
            $data['fee'] += $item->fee;
            $data['total_amount'] += $item->total_amount;
        }

        $data['type'] = OrderType::Group;
        $data['status'] = OrderStatus::Processing;

        DB::beginTransaction();
        try {
            unset($data['idCheck'], $data['id']);

            $orderGroup = $this->repository->create($data);

            $this->repository->updateMultipleRecord(
                [
                    ['id', 'in', $orderChild->pluck('id')->toArray()]
                ],
                [
                    'parent_id' => $orderGroup->id,
                ]
            );

            DB::commit();
            return $orderGroup;

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;

            return false;
        }
    }
}
