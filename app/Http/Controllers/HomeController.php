<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index() {
        $users = User::where("id", 1)->get();
    

        return view('pages.home.home');
    }

}
