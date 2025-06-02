<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_videos');
    }
    public static function getVideos ($pesquisar = null)
    {
        $query = self::from ('videos as v')
            ->leftJoin ('categories_videos as cv', 'cv.video_id','=', 'v.id')
            ->leftJoin ('categories as c', 'c.id', '=', 'cv.category_id')
            ->select ('v.*', 'c.name as category_name')
            ->groupBy('v.id', 'v.title', 'v.description', 'v.created_at', 'v.updated_at');
        if ($pesquisar) 
        {
            $query->where(function($q) use ($pesquisar)
            {
                $q->where('v.title', 'like', "%$pesquisar%")
                  ->orWhere('v.description', 'like', "%$pesquisar%");
            });
        }
        return $query->orderBy('id')->paginate(10);
    }

}
