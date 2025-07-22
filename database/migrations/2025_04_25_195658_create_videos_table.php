<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            
            $table->id(); 
            $table->string('title', 100);
            $table->string('thumbnail')->nullable(); 
            $table->string('thumbnail_mimetype')->nullable();
            $table->string('video')->nullable();
            $table->string('video_mimetype')->nullable();
            $table->time('duration'); 
            $table->text('description'); 
            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('is_public')->default(true);
            $table->timestamps();   
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
