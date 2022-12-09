<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->double('prize')->nullable();
            $table->string('cover')->nullable();
            $table->text('images')->nullable();
            $table->text('ingredients')->nullable();
            $table->text('allergens')->nullable();
            $table->boolean('hidden')->default(0);
            $table->unsignedBigInteger('categoryId')->nullable();
            $table->timestamps();
            
            $table->foreign('categoryId', 'products_categories_null_fk')->references('id')->on('categories');
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
