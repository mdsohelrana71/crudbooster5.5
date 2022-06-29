<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feature_id')->unsinged();
            $table->integer('plan_id')->unsinged();
            $table->index(["feature_id","plan_id"]);   
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
        Schema::dropIfExists('feature_plans');
    }
}
