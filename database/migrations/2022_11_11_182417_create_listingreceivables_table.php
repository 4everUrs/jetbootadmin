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
        Schema::create('listingreceivables', function (Blueprint $table) {
            $table->id();
            $table->string('lrname');
            $table->string('lrattachment');
            $table->string('lrremarks')->nullable();
            $table->string('lrstatus');
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
        Schema::dropIfExists('listingreceivables');
    }
};
