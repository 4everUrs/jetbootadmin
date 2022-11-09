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
        Schema::create('trypays', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('payhour');
            $table->string('totalhours');
            $table->string('overtime');
            $table->string('latededuction');
            $table->string('penstiondeduction');
            $table->string('salary');
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
        Schema::dropIfExists('trypays');
    }
};
