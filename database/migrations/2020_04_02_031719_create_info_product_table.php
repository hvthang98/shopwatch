<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gender');
            $table->string('type', 45);
            $table->string('glass_material', 45);
            $table->string('frames', 45);
            $table->string('waterproof', 45);
            $table->integer('diameter');
            $table->integer('thickness');
            $table->string('strap_material', 45);
            $table->integer('strap_width');
            $table->integer('strap_change');
            $table->integer('expiry_date');
            $table->string('address',100);
            $table->integer('brands_id')->unsigned();
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
        Schema::dropIfExists('info_product');
    }
}
