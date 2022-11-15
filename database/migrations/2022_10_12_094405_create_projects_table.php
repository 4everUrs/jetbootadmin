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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('supplier_id');
            $table->string('description');
            $table->string('manager');
            $table->bigInteger('budget');
            $table->string('duration');
            $table->string('contractor')->nullable();
            $table->string('contractor_manager')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('completion_date')->nullable();
            $table->integer('progress')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
