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
        Schema::create('temp_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('purchase_order_id');
            $table->string('po_id');
            $table->string('item');
            $table->integer('qty');
            $table->integer('cost');
            $table->integer('totalcost');
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
        Schema::dropIfExists('temp_items');
    }
};
