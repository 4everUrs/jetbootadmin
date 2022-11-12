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
        Schema::create('asset_invoices', function (Blueprint $table) {
            $table->id()->startingValue(10001);
            $table->unsignedInteger('buyer_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('user_id');
            $table->string('creator');
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
        Schema::dropIfExists('asset_invoices');
    }
};
