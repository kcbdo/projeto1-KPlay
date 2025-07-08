<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Playlist; 
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Support\Facades\DB; 

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos'; 

    protected $fillable = [
        'title',
        'thumbnail',
        'video',
        'link',
        'duration',
        'description',
        'user_id',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_videos');
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'videos_playlists')
                    ->withPivot('order') 
                    ->withTimestamps(); 
    }

    public static function scopeGetVideos ($query, $pesquisar = null)
    {
        $query
            ->leftJoin ('categories_videos as cv', 'cv.video_id','=', 'videos.id')
            ->leftJoin ('categories as c', 'c.id', '=', 'cv.category_id')
            ->select ('videos.*', DB::raw('json_agg(c.name)'))
            ->groupBy('videos.id'); 

        if ($pesquisar)
        {
            $query->where(function($q) use ($pesquisar)
            {
                $q->where('videos.title', 'ilike', "%$pesquisar%")
                  ->orWhere('videos.description', 'ilike', "%$pesquisar%");
            });
        }

        return $query->orderBy('id')->paginate(10);
    }
}