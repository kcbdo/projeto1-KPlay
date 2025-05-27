<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_videos', function (Blueprint $table){
            
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('video_id');
            $table->timestamps();

            $table->foreign('category_id')->references("id")->on("categories")->onDelete("cascade");
            $table->foreign('video_id')->references("id")->on("videos")->onDelete("cascade");
            $table->primary(['category_id', 'video_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_videos'); 
    }
}
