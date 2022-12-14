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
        Schema::create('applicant_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('listing_id');
            $table->string('position');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('resume_file');
            $table->string('company');
            $table->string('location');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('applicant_forms');
    }
};
