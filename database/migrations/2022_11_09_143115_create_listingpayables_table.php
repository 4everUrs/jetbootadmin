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
        Schema::create('listingpayables', function (Blueprint $table) {
            $table->id();
            $table->string('lpname');
            $table->string('lppaymade');
            $table->bigInteger('lptotalamount');
            $table->string('lpduedate');
            $table->string('lpattachment');
            $table->string('lpremarks');
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
        Schema::dropIfExists('listingpayables');
    }
};
