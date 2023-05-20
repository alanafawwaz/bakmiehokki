<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->enum('posisi', ['kitchen', 'dishwash', 'gudang'])->nullable();
            $table->enum('role', ['admin', 'pegawai']);
            $table->enum('gender', ['L', 'P']);
            $table->enum('type', ['full', 'part']);
            $table->string('domisili');
            $table->string('telp', 13);
            $table->string('password');
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
};
