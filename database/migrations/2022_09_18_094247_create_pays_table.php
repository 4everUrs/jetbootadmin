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
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('position');
            $table->string('datein');
            $table->string('dateout');
            $table->integer('payhour');
            $table->integer('totalhours');
            $table->integer('overtime');
            $table->integer('latededuction');
            $table->integer('penstiondeduction');
            $table->integer('sss');
            $table->integer('pagibig');
            $table->integer('phil');
            $table->integer('salary');
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
        Schema::dropIfExists('pays');
    }
};
