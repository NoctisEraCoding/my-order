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
            $table->unsignedBigInteger('userId')->nullable();
            $table->string('couponCode')->nullable();
            $table->double('total')->nullable();
            $table->boolean('payed')->default(0);
            $table->unsignedBigInteger('couriedId')->nullable();
            $table->timestamps();
            
            $table->foreign('couriedId', 'orders_couriers_id_fk')->references('id')->on('couriers');
            $table->foreign('userId', 'orders_users_id_fk')->references('id')->on('users');
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
