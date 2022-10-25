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
        Schema::create('international_payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('attendance');
            $table->string('salary');
            $table->string('contribution');
            $table->string('placement');
            $table->string('collection');
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
        Schema::dropIfExists('international_payrolls');
    }
};