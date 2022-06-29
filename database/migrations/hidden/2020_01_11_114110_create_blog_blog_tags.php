<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogBlogTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_blog_tags', function (Blueprint $table) {
            $table->integer("blog_id")->unsigned();
            $table->integer("blog_tag_id")->unsigned();
            $table->foreign('blog_id')->references("id")->on('blogs')
            ->onDelete("cascade");
            $table->foreign('blog_tag_id')->references("id")->on("blog_tags")
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
        Schema::dropIfExists('blog_blog_tags');
    }
}
