<?php

namespace App\Http\Controllers;

use App\Category;
use App\Commune;
use App\Post;
use App\Region;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($cat, Post $slug)
    {
        dd($cat);
    }

    public function create()
    {
        $region = Region::all();
        $commune = Commune::all();
        return view("posts.create", compact('region', 'commune'));
    }

    public function store(Request $request)
    {
        Post::create($request->input());

        return back()->with('message', ['success', __('Aviso publicado con éxito')]);
    }

}
