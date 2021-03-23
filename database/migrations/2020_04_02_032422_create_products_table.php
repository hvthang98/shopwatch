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
            $table->increments('id');
            $table->integer('brands_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->double('price');
            $table->double('sellprice');
            $table->text('content')->nullable();
            $table->integer('status')->default(0);
            $table->integer('ordernum');
            $table->double('quantily')->default(0);
            $table->longText('infor')->nullable();
            $table->double('views')->default(0);
            $table->string('tags')->nullable();
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
        Schema::dropIfExists('products');
    }
}
