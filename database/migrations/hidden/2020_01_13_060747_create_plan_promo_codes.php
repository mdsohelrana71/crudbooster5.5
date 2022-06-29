<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanPromoCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("plan_id")->unsigned();
            $table->integer("promo_code_id")->unsigned();
            $table->foreign("plan_id")->references("id")->on("plans")
            ->onDelete("cascade");
             $table->foreign("promo_code_id")->references("id")->on("promo_codes")
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
        Schema::dropIfExists('plan_promo_codes');
    }
}
