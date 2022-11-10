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
        Schema::create('job_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->string('name');
            $table->string('position');
            $table->string('salary');
            $table->string('daily_salary');
            $table->string('collection');
            $table->string('details');
            $table->string('location');
            $table->integer('applicants');
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
        Schema::dropIfExists('job_lists');
    }
};
