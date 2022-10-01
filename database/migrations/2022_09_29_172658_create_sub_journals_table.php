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
        Schema::create('sub_journals', function (Blueprint $table) {
            $table->id();
            $table->string('jdescription');
            $table->integer('jcredit');
            $table->integer('jdebit');
            $table->string('jencoded');
            $table->integer('journal_id');
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
        Schema::dropIfExists('sub_journals');
    }
};
