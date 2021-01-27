<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('employee_id');
            $table->integer('amount_in_cents');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('CASCADE');
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
