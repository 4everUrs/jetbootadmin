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
        Schema::create('release_budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('list_requested_id');
            $table->string('rcategory');
            $table->string('raccount');
            $table->string('rstatus');
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
        Schema::dropIfExists('release_budgets');
    }
};
