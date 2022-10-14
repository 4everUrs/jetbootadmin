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
            $table->string('jsubdescription');
            $table->integer('jcredit');
            $table->integer('jdebit');
            $table->string('jstatus');
            $table->unsignedInteger('journal_entry_id');
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
