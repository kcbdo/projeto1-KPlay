<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Video; 

class Playlist extends Model
{
    use HasFactory;

    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class, 'videos_playlists');
    }

}
