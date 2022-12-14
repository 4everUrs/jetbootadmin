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
        Schema::create('applicant_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('listing_id');
            $table->string('position');
            $table->string('company_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('resume_file');
            $table->string('status')->nullable();
            $table->string('location');
            $table->string('time')->nullable();
            $table->string('date')->nullable();
            $table->string('venue')->nullable();
            $table->string('person')->nullable();
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
        Schema::dropIfExists('applicant_lists');
    }
};
