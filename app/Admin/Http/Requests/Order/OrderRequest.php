<?php

namespace App\Admin\Http\Requests\Order;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Order\OrderType;
use App\Enums\Order\PaymentStatus;
use App\Enums\Order\PaymentMethod;
use App\Enums\Order\OrderStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        $rules = [
            'driver_id' => ['nullable', 'exists:App\Models\Admin,id'],
            'customer_sender_id' => ['required', 'exists:App\Models\Customer,id'],
            'customer_receiver_id' => ['required', 'exists:App\Models\Customer,id'],
            'goods_content' => 'nullable|string',
            'note' => 'nullable|string',
            'weight' => ['nullable', 'numeric'],
            'fee' => ['nullable', 'numeric'],
            'total_amount' => ['nullable', 'numeric'],
            'payment_method' => ['required', new Enum(PaymentMethod::class)],
            'images' => ['nullable', 'string'],
        ];
        return $rules;
    }

    protected function methodPut()
    {
        if (Auth::guard('admin')->user()->isDriver()) {
            return [
                'id' => ['exists:App\Models\Order,id'],
                'status' => ['required', new Enum(OrderStatus::class)],
                'images' => ['nullable'],
            ];
        }

        $rules = [
            'id' => ['required', 'exists:App\Models\Order,id'],
            'goods_content' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
            'images' => ['nullable', 'string'],
            'status' => ['required', new Enum(OrderStatus::class)],
        ];
        if ($this->routeIs('admin.order.update')) {
            $rules += [
                'weight' => ['nullable', 'numeric'],
                'fee' => ['nullable', 'numeric'],
                'total_amount' => ['nullable', 'numeric'],
                'customer_receiver_id' => ['required', 'exists:App\Models\Customer,id'],
                'payment_status' => ['required', new Enum(PaymentStatus::class)],
                'payment_method' => ['required', new Enum(PaymentMethod::class)],
                'driver_id' => ['required', 'exists:App\Models\Admin,id'],
            ];

            if ($this->input('type') === OrderType::Normal) {
                $rules += [
                    'customer_sender_id' => ['required', 'exists:App\Models\Customer,id'],
                ];
            }

        } elseif ($this->routeIs('admin.order.merge')) {
            $rules += [
                'idCheck' => ['required', 'array'],
                'idCheck.*' => ['required', 'exists:App\Models\Order,id'],
            ];
        }
        return $rules;
    }
}