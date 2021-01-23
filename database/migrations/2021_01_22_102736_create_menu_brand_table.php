<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_brand', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menus_id')->unsigned()->nullable();
            $table->integer('brands_id')->unsigned()->nullable();
            $table->foreign('menus_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('menu_brand');
    }
}
