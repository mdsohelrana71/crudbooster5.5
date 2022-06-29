<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->string("name");
            $table->integer("uses")->default(0);
            $table->string("description");
            $table->integer("max_uses");
            $table->integer("max_uses_user");
            $table->string("type")->default("cart");
            $table->double("min_buy_amount");
            $table->double("discount_amount");
            $table->string("is_fixed",4)->default('yes');
            $table->dateTime("started_at")->nullable();
            $table->dateTime("end_at")->nullable();
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
        Schema::dropIfExists('promo_codes');
    }
}
