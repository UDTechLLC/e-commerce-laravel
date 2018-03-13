<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plan_id')->nullable();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('category')->nullable();
            $table->text('description');
            $table->integer('old_amount')->nullable();
            $table->integer('amount');
            $table->integer('count')->nullable();
            $table->string('view_name')->nullable();
            $table->integer('position')->nullable();
            $table->boolean('published')->default(true);
            $table->string('slug');
            $table->boolean('isVirtual')->default(true);
            $table->unsignedInteger('parent_id')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('products');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
