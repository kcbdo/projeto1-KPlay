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
    return $this->belongsToMany(Category::class,'categories_videos');
}

}

    