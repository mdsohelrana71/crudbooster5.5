<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanSepecifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_sepecifications', function (Blueprint $table) {
            $table->integer("plan_id")->unsigned();
            $table->integer("sepecification_id")->unsigned();
            $table->json("value");
            $table->foreign("plan_id")->references("id")->on("plans")
            ->onDelete("cascade");
            $table->foreign("sepecification_id")->references("id")->on("specifications")
            ->onDelete("cascade");
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
        Schema::dropIfExists('plan_sepecifications');
    }
}
