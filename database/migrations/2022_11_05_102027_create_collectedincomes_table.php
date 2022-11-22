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
        Schema::create('collectedincomes', function (Blueprint $table) {
            $table->id();
            $table->string('cname');
            $table->integer('caccountno');
            $table->string('cdescription');
            $table->string('cparticular');
            $table->string('creference');
            $table->string('cdatereceive');
            $table->string('cmodeofpayment');
            $table->bigInteger('camount');
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
        Schema::dropIfExists('collectedincomes');
    }
};
