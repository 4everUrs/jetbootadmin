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
        Schema::create('logisticannuals', function (Blueprint $table) {
            $table->id();
            $table->integer('lyear');
            $table->bigInteger('ldeptbudget');
            $table->bigInteger('lobudget');
            $table->bigInteger('lfbudget');
            $table->bigInteger('lcbudget');
            $table->bigInteger('llbudget');
            $table->bigInteger('lsbudget');           
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
        Schema::dropIfExists('logisticannuals');
    }
};
