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
            $table->string('item_name');
            $table->integer('quantity');
            $table->bigInteger('unit_cost');
            $table->bigInteger('shipping_fee');
            $table->bigInteger('tax');
            $table->bigInteger('subtotal');
            $table->string('requestor');
            $table->bigInteger('proposedamount');
            $table->string('description')->nullable();
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
