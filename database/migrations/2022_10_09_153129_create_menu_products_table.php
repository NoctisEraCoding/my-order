<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menuId')->nullable();
            $table->unsignedBigInteger('productId')->nullable();
            $table->timestamps();
            
            $table->foreign('menuId', 'menuProducts_menus_id_fk')->references('id')->on('menus');
            $table->foreign('productId', 'menuProducts_products_null_fk')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_products');
    }
}
