<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('unique_order_id');
            $table->integer('delivery_address')->unsigned();
            $table->string('mobile');
            $table->float('total_price');
            $table->float('discount_price');
            $table->float('shipping_charges');
            $table->string('wallet_deduction')->nullable();
            $table->string('cod_charge')->nullable();
            $table->float('payable_amount');
            $table->string('payment_method');
            $table->string('txn_id')->nullable();
            $table->string('order_status');
            $table->text('rejected_reason')->nullable();
            $table->string('expected_delivery_date')->nullable();
            $table->timestamps();
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
