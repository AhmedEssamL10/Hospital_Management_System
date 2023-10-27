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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('en_name', 50);
            $table->string('ar_name', 50);
            $table->text('en_desc');
            $table->text('ar_desc');
            $table->decimal('total_before_discount', 8, 2);
            $table->decimal('total_after_discount', 8, 2);
            $table->decimal('discount_value', 8, 2);
            $table->decimal('tax_rate', 8, 2);
            $table->decimal('total', 8, 2);
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
        Schema::dropIfExists('offers');
    }
};
