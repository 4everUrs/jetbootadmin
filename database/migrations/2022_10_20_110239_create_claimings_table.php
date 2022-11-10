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
        Schema::create('claimings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('basepay');
            $table->string('benefits');
            $table->string('insentives');
            $table->string('insurance');
            $table->string('overall');
            $table->string('status');
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
        Schema::dropIfExists('claimings');
    }
};
