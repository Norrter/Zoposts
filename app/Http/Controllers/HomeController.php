<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;



class HomeController extends BaseController
{
    function index(){
        $latestPosts = Post::latest()->take(6)->get();
        return view('home', compact('latestPosts'));
    }

    public function contacts(){
        return view('contacts');
    }
}
