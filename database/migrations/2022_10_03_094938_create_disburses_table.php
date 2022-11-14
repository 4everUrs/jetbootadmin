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
        Schema::create('disburses', function (Blueprint $table) {
            $table->id();
            $table->string('dorigin');
            $table->string('drequestor');
            $table->string('dremarks');
            $table->string('damount');
            $table->string('dstatus');
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
        Schema::dropIfExists('disburses');
    }
};
