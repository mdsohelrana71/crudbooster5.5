<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddonPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addon_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("addon_id")->unsinged();
            $table->integer("plan_id")->unsinged();
            $table->double("price");
            $table->unique(['addon_id','plan_id']);
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
        Schema::dropIfExists('addon_plans');
    }
}
