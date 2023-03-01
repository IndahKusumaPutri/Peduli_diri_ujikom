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
            $table->string('nik');
            $table->string('name');
            $table->string('telp')->nullable();
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->text('alamat')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('password_confirmation')->nullable();
            $table->string('role');
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
