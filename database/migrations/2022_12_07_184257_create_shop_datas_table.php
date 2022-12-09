<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_datas', function (Blueprint $table) {
            $table->id()->index();
            $table->string('phone')->nullable();
            $table->string('workDay')->nullable();
            $table->string('workHour')->nullable();
            $table->string('closedDay')->nullable();
            $table->text('location')->nullable();
            $table->string('email')->nullable();
            $table->text('googleMap')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_datas');
    }
}
