<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    

    //Define um relacionamento muitos-para-muitos, já que uma categoria pode ter muitos vídeos e um vídeo pode ter muitas categorias. 
    public function videos(): BelongsToMany    
    {
        return $this->belongsToMany(Video::class,'categories_videos');
    } 

    public static function scopeGetCategories($query, $pesquisar = null)
    {
         if ($pesquisar) 
        {
            $query->where('name', 'ilike', "%$pesquisar%");
        }
        
        return $query->orderBy('id')->paginate(10);

    }

}   

