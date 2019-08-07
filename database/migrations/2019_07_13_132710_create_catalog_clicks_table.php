<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_clicks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->integer('user_form_id')->nullable();
            $table->integer('catalog_id')->default(0);
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
        Schema::dropIfExists('catalog_clicks');
    }
}
