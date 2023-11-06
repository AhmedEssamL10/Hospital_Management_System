<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('en_name', 30);
            $table->string('ar_name', 30);
            $table->string('en_address', 70);
            $table->string('ar_address', 70);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('national_id')->unique();
            $table->enum('blood_group', ['+O' . '-O', '+A', '-A', '+B', '-B', '+AB', '-AB']);
            $table->enum('gender', ['m', 'f']);
            $table->date('birth_date');
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
        Schema::dropIfExists('patients');
    }
};
