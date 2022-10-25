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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('rname');
            $table->integer('noinvoice');
            $table->string('rdate');
            $table->bigInteger('rinvoiceamount');
            $table->bigInteger('ramountreceived');
            $table->string('rdatereceived');
            $table->string('rduedate');  
            $table->string('routstanding');  
            $table->string('rremarks');  
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
        Schema::dropIfExists('incomes');
    }
};
