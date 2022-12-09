<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('siteName')->nullable();
            $table->string('siteUrl')->nullable();
            $table->string('siteLogo')->nullable();
            $table->string('stripePrivate')->nullable();
            $table->string('stripePublic')->nullable();
            $table->integer('versionSite')->default(1);
            $table->string('versionSiteText')->nullable();
            $table->string('pusher_app_key')->nullable();
            $table->string('pusher_app_secret')->nullable();
            $table->string('pusher_app_id')->nullable();
            $table->string('pusher_cluster')->nullable();
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
        Schema::dropIfExists('configurations');
    }
}
