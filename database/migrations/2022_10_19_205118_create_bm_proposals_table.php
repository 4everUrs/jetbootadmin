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
        Schema::create('bm_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('proposalname');
            $table->string('requestor');
            $table->string('proposedamount');
            $table->string('description');
            $table->string('approvedate')->nullable()->default('N/A');
            $table->string('approvedamount')->nullable();
            $table->string('rstatus');
            $table->string('remarks')->nullable()->default('N/A');
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
        Schema::dropIfExists('bm_proposals');
    }
};
