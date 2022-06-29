<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {

        if (!Schema::hasColumn('plans', 'plan_price')){
            $table->string('plan_price')->nullable()->after('garages');
        }

        if (!Schema::hasColumn('plans', 'title')){
            $table->string('title')->nullable()->after('plan_number');
        }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn(['garages','plan_number']);
        });
    }
}
