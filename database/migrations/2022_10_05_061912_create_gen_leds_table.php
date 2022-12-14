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
        Schema::create('gen_leds', function (Blueprint $table) {
            $table->id();
            $table->string('ldescription');
            $table->string('ldate');
            $table->string('ldebit');
            $table->string('lcredit'); 
            $table->string('lstatus'); 
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
        Schema::dropIfExists('gen_leds');
    }
};
