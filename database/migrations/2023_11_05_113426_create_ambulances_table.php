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
        Schema::create('ambulances', function (Blueprint $table) {
            $table->id();
            $table->string('car_number', 10);
            $table->string('car_model', 30);
            $table->string('manufacturing_year', 10);
            $table->string('en_name_driver', 30);
            $table->string('ar_name_driver', 30);
            $table->string('en_note');
            $table->string('ar_note');
            $table->string('license_number', 30);
            $table->string('phone', 11)->unique();
            $table->enum('status', ['0', '1'])->default('1');
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
        Schema::dropIfExists('ambulances');
    }
};