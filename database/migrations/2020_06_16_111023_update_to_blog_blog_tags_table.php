<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateToBlogBlogTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_blog_tags', function (Blueprint $table) {
            $table->renameColumn('blog_tag_id', 'blog_tags_id');
            $table->renameColumn('blog_id', 'blogs_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_blog_tags', function (Blueprint $table) {
            $table->renameColumn('blog_tags_id', 'blog_tag_id');
            $table->renameColumn('blogs_id', 'blog_id');
        });
    }
}
