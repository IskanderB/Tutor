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
            $table->string('name', 10);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 32);
            $table->rememberToken();
            $table->timestamps();
            $table->string('number_phone', 30)->default('Не заполнено');
            $table->string('full_name', 50)->default('Не заполнено');
            $table->string('address', 140)->default('Не заполнено');
            $table->string('number_school', 30)->default('Не заполнено');
            $table->string('number_class', 10)->default('Не заполнено');
            $table->string('subject', 40)->default('Не заполнено');
            $table->string('mark', 50)->default('Не заполнено');
            $table->string('goal', 200)->default('Не заполнено');
            $table->string('confirmation-token')->unique()->nullable();
            $table->string('is_confirmed')->default(false);
            $table->boolean('is_tutor')->default(false);
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
