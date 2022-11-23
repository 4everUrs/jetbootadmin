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
        Schema::create('payable_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('eprequestor');
            $table->string('epdescription');
            $table->string('epaymenttype');
            $table->string('epaymentdate');
            $table->string('epamount');
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
        Schema::dropIfExists('payable_expenses');
    }
};
