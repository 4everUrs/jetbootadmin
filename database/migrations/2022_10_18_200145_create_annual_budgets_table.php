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
        Schema::create('annual_budgets', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->default(2022);
            $table->bigInteger('budgetannual')->default(20000000);
            $table->bigInteger('blogistics');
            $table->bigInteger('bcore');
            $table->bigInteger('bhr');
            $table->bigInteger('bfinance');           
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
        Schema::dropIfExists('annual_budgets');
    }
};
