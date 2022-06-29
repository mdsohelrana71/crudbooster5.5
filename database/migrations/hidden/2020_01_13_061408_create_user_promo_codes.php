<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPromoCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("promo_code_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->foreign("promo_code_id")->references("id")->on("promo_codes")
            ->onDelete("cascade");
             $table->foreign("user_id")->references("id")->on("users")
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
        Schema::dropIfExists('user_promo_codes');
    }
}
