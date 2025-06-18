<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosPlaylistsTable extends Migration
{
    public function up()
    {
        Schema::create('videos_playlists', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedInteger('video_id');
            $table->unsignedInteger('playlist_id');
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->foreign('playlist_id')->references("id")->on("playlists")->onDelete("cascade");
            $table->foreign('video_id')->references("id")->on("videos")->onDelete("cascade");
            $table->unique(['playlist_id', 'video_id']);
            
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
