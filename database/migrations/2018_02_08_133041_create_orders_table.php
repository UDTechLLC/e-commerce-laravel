<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Order;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_key');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('shipping_id')->nullable();
            $table->unsignedInteger('billing_id')->nullable();
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('coupon_id')->nullable();
            $table->integer('product_cost')->nullable();
            $table->integer('shipping_cost')->nullable();
            $table->integer('total_cost')->nullable();
            $table->integer('count');
            $table->enum('state', Order::ORDER_STATES)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->foreign('shipping_id')->references('id')->on('order_shipping');
            $table->foreign('billing_id')->references('id')->on('order_billing');
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
}
