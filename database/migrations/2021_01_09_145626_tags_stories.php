<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TagsStories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_stories',function (Blueprint $table){
            $table->unsignedBigInteger('story_id');
            $table->unsignedBigInteger('tag_id');
            $table->unique(['story_id','tag_id']);
            $table->foreign('story_id')->on('stories')->references('id')->onDelete('CASCADE');
            $table->foreign('tag_id')->on('tags')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
