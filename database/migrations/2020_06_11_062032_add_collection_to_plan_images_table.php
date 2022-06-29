<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollectionToPlanImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_images', function (Blueprint $table) {
            if (!Schema::hasColumn('plan_images', 'collection_id')){
            $table->integer('collection_id')->nullable()->after('plan_id');
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
        Schema::table('plan_images', function (Blueprint $table) {
            $table->dropColumn('collection_id');
        });
    }
}
