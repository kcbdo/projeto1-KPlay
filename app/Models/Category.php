<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;


class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    
    public function videos()
    {
        return $this->belongsToMany('App\Models\Video');
    }    
}
