<?php

namespace App\Models;

use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderType;
use App\Enums\Order\PaymentMethod;
use App\Enums\Order\PaymentStatus;
use App\Observers\Order\OrderOserver;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];


    protected $casts = [
        'weight' => 'double',
        'fee' => 'double',
        'total_amount' => 'double',
        'type' => OrderType::class,
        'payment_status' => PaymentStatus::class,
        'payment_method' => PaymentMethod::class,
        'status' => OrderStatus::class,
        'images' => AsArrayObject::class
    ];

    public function childs()
    {
        return $this->hasMany(Order::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Order::class, 'parent_id');
    }
    public function sender()
    {
        return $this->belongsTo(Customer::class, 'customer_sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Customer::class, 'customer_receiver_id');
    }

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function driver()
    {
        return $this->belongsTo(Admin::class, 'driver_id');
    }
}