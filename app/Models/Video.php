<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use App\Models\Playlist; 

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_videos');
    }
    public static function scopeGetVideos ($query, $pesquisar = null)
    {
        $query
            ->leftJoin ('categories_videos as cv', 'cv.video_id','=', 'videos.id')
            ->leftJoin ('categories as c', 'c.id', '=', 'cv.category_id')
            ->select ('videos.*', DB::raw('group_concat(c.name)'))
            ->groupBy('videos.id'); 

        if ($pesquisar) 
        {
            $query->where(function($q) use ($pesquisar)
            {
                $q->where('videos.title', 'like', "%$pesquisar%")
                  ->orWhere('videos.description', 'like', "%$pesquisar%");
            });
        }

        return $query->orderBy('id')->paginate(10);

        
    }
    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'videos_playlists'); 
    }

}
