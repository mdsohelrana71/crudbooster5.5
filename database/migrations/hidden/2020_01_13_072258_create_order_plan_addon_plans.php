<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPlanAddonPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plan_addon_plans', function (Blueprint $table) {
            $table->integer('order_plan_id')->unsigned();
            $table->integer('addon_plan_id')->unsigned();
            $table->double('price');
            $table->index(['order_plan_id','addon_plan_id']);
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('order_plan_addon_plans');
    }
}
