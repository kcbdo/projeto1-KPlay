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
    
    public function videos(): BelongsToMany    
    {
        return $this->belongsToMany(Video::class,'categories_videos');
    }    
}
