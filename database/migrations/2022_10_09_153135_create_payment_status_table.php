<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderId')->nullable();
            $table->unsignedBigInteger('userId')->nullable();
            $table->string('intentStripe')->nullable();
            $table->string('chargeStripe')->nullable();
            $table->string('refundStripe')->nullable();
            $table->string('refundReason')->nullable();
            $table->timestamps();
            
            $table->foreign('userId', 'paymentStatus___fk')->references('id')->on('users');
            $table->foreign('orderId', 'paymentStatus_orders_null_fk')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_status');
    }
}
