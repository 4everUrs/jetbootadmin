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
            $table->string('rfrom');
            $table->string('caddress');
            $table->string('cramount');
            $table->string('receiptno');
            $table->string('paytype');
            $table->string('cremarks');
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
