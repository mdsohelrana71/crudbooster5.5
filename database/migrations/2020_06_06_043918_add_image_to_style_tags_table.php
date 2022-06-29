<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToStyleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('style_tags', function (Blueprint $table) {
            if (!Schema::hasColumn('style_tags', 'style_image')){
            $table->string('style_image')->nullable()->after('name');
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
        Schema::table('style_tags', function (Blueprint $table) {
            $table->dropColumn('style_image');
        });
    }
}
