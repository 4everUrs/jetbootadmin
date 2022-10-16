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
        Schema::create('list_requesteds', function (Blueprint $table) {
            $table->id();
            $table->string('origdept');
            $table->string('requestor');
            $table->integer('ramount');
            $table->string('rdescription');
            $table->string('approveddate')->nullable();
            $table->string('rstatus'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_requesteds');
    }
};
