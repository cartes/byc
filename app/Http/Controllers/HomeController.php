<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('category', 'seller')
            ->where('status', Post::PUBLISHED)
            ->with('images')
            ->latest()
            ->paginate(20);
        return view('home', compact('posts'));
    }
}
