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
        Schema::create('compensation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->integer('basepay');
            $table->integer('benefits');
            $table->integer('insentives');
            $table->integer('insurance');
            $table->string('overall');
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
        Schema::dropIfExists('compensation');
    }
};
