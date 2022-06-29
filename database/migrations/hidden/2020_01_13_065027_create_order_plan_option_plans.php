<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPlanOptionPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plan_option_plans', function (Blueprint $table) {
            $table->integer('order_plan_id')->unsigned();
            $table->integer('option_plan_id')->unsigned();
            $table->double("price");
            $table->index(['order_plan_id','option_plan_id']);
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
        Schema::dropIfExists('order_plan_option_plans');
    }
}
