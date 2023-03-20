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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('unique_product_id');
            $table->string('slug');
            $table->integer('pet_type')->nullable();
            $table->integer('category')->nullable();
            $table->integer('subcategory')->nullable();
            $table->string('price');
            $table->string('offer_price');
            $table->integer('gst_percentage')->nullable();
            $table->integer('brand')->nullable();
            $table->integer('lifestage')->nullable();
            $table->integer('health_consideration')->nullable();
            $table->integer('breed')->nullable();
            $table->string('weight',20)->nullable();
            $table->integer('volume')->nullable();
            $table->integer('tablet_quantity')->nullable();
            $table->integer('composition')->nullable();
            $table->integer('color')->nullable();
            $table->string('size',10)->nullable();
            $table->text('description')->nullable();
            $table->integer('stock')->default(1);
            $table->boolean('status')->default(true);
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('products');
    }
}
