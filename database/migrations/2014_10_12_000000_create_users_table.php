<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('number_phone')->default('Не заполнено');
            $table->string('full_name')->default('Не заполнено');
            $table->string('address')->default('Не заполнено');
            $table->string('number_school')->default('Не заполнено');
            $table->string('number_class')->default('Не заполнено');
            $table->string('subject')->default('Не заполнено');
            $table->string('mark')->default('Не заполнено');
            $table->string('goal')->default('Не заполнено');
            $table->string('confirmation-token')->unique()->nullable();
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
