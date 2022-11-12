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
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('payroll_id');
            $table->unsignedInteger('local_employee_id');
            $table->bigInteger('gross_salary');
            $table->bigInteger('sss')->nullable();
            $table->bigInteger('philhealth')->nullable();
            $table->bigInteger('pagibig')->nullable();
            $table->bigInteger('net_salary')->nullable();
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
        Schema::dropIfExists('payslips');
    }
};
