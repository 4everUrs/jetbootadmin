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
        Schema::create('vendor_shops', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('condition');
            $table->string('description');
            $table->integer('amount');
            $table->integer('stocks');
            $table->integer('sold')->default(0);
            $table->string('thumbnail');
            $table->string('status');
            $table->string('origin');
            $table->softDeletes();
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
        Schema::dropIfExists('vendor_shops');
    }
};
