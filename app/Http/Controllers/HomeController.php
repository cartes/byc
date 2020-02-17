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
        $posts = Post::where('status', Post::PUBLISHED)
            ->with(['category', 'seller', 'images', 'region', 'commune'])
            ->latest()->paginate();

        return view('home', compact('posts'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $posts = Post::where("name", "LIKE", "%{$search}%")
            ->orWhere("description", "LIKE", "%{$search}%")
            ->with('category', 'seller', 'images', 'region', 'commune')
            ->latest()
            ->paginate();

        return view('home', compact('posts'));
    }
}
