<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $videos = Video::where('is_public', true)
        ->whereNotNull('video')
        ->latest()
        ->paginate(10);

        return view('site.home', compact('videos'));
    }
}
