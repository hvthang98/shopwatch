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
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->double('price')->default(0);
            $table->double('sellprice')->default(0);
            $table->double('quantily')->default(0);
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('sort')->nullable();
            $table->longText('infor')->nullable();
            $table->double('views')->default(0);
            $table->longText('tags')->nullable();
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
