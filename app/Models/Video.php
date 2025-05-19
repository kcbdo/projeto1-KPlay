<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';

    public function categories()
{
    return $this->belongsToMany('App\Models\Category');
}

}

    