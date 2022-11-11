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
        Schema::create('list_requesteds', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('proposalname');
            $table->string('requestor');
            $table->string('proposedamount');
            $table->string('approvedate')->nullable();
            $table->string('approvedamount')->nullable();
            $table->string('attachment')->nullable();
            $table->string('rstatus'); 
            $table->string('remarks'); 
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
        Schema::dropIfExists('list_requesteds');
    }
};
