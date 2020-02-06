<?php

namespace App\Http\Controllers;

use App\Category;
use App\Commune;
use App\Http\Requests\PostRequest;
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
        $categories = Category::orderby('name')->get();
        return view("posts.create", compact('region', 'commune', 'categories'));
    }

    public function store(PostRequest $request)
    {
        dd($request);

        Post::create($request->input());

        return back()->with('message', ['success', __('Aviso publicado con éxito')]);
    }

    public function communes(Request $request)
    {
        $communes = Commune::where('region_id', $request->get('id'))->get();

        $output = [];
        foreach ($communes as $comune) {
            $output[$comune->id] = $comune->name;
        }
        return $output;
    }

}
