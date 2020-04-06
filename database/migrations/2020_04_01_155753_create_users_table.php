<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100)->collation('utf8_unicode_ci');
            $table->string('password', 100)->collation('utf8_unicode_ci');
            $table->string('name', 50)->collation('utf8_unicode_ci');
            $table->date('birthday');
            $table->string('phone_number', 12)->collation('utf8_unicode_ci');
            $table->string('address', 100)->collation('utf8_unicode_ci');
            $table->integer('level')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
