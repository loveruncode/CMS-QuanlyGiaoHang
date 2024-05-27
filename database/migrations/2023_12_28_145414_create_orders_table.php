<?php

use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderType;
use App\Enums\Order\PaymentMethod;
use App\Enums\Order\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('driver_id')->nullable();
            $table->foreignId('customer_sender_id')->nullable();
            $table->foreignId('customer_receiver_id')->nullable();
            $table->tinyInteger('type')->default(OrderType::Normal->value);
            $table->text('goods_content')->nullable();
            $table->text('note')->nullable();
            $table->float('weight')->default(0);
            $table->double('fee')->default(0);
            $table->double('total_amount')->default(0);
            $table->tinyInteger('payment_status')->default(PaymentStatus::UnPaid->value);
            $table->tinyInteger('payment_method')->default(PaymentMethod::COD->value);
            $table->tinyInteger('status')->default(OrderStatus::Processing->value);
            $table->text('images')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('orders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};