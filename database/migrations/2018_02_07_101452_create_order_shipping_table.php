<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shipping', function (Blueprint $table) {
            $table->increments('id');
//            $table->unsignedInteger('order_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('street');
            $table->string('apartment')->nullable();
            $table->string('country');
            $table->string('iso_3166');
            $table->string('city');
            $table->string('state');
            $table->string('postcode');
            $table->timestamps();

//            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_shipping');
    }
}
