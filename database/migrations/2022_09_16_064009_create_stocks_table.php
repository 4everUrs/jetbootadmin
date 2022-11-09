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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->unsignedInteger('supplier_id');
            $table->string('name');
            $table->string('stock_quantity');
            $table->string('description');
            $table->bigInteger('cost_per_item');
            $table->integer('stock_value');
            $table->string('status');
            $table->integer('reorder_level')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('stocks');
    }
};
