<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallPlanDetailCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_plan_detail_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('call_plan_id');
            $table->unsignedInteger('call_plan_detail_id');
            $table->unsignedInteger('customer_id');
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
        Schema::dropIfExists('call_plan_detail_customers');
    }
}
