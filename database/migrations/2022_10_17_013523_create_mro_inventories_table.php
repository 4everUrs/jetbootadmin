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
        Schema::create('mro_inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('stock_id');
            $table->string('item_name');
            $table->string('description');
            $table->integer('quantity');
            $table->bigInteger('unit_price');
            $table->bigInteger('inventory_value');
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
        Schema::dropIfExists('mro_inventories');
    }
};
