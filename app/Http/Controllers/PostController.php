<?php

namespace App\Http\Controllers;

use App\Category;
use App\Commune;
use App\Http\Requests\PostRequest;
use App\Image;
use App\Post;
use App\Region;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function show(Post $slug)
    {
        $post = $slug;
        $seller = Seller::where('id', $post->seller_id)
            ->with('user')
            ->with('meta')
            ->first();
        $images = Image::where('post_id', '=', $post->id)->get();

        return view("posts.detail", compact('post', 'seller', 'images'));
    }

    public function create()
    {
        $region = Region::all();
        $commune = Commune::all();
        $categories = Category::orderby('name')->get();
        if (auth()->user()) {
            $user = User::whereId(auth()->user()->id)->first();
        } else {
            $user = [];
        }
        return view("posts.create", compact('region', 'commune', 'categories', 'user'));
    }

    public function store(PostRequest $request)
    {
        $lastId = Post::orderBy('updated_at', 'desc')->first();
        $slug = Str::slug($request->name . '-' . $lastId->id);

        $seller = Seller::create([
            'user_id' => auth()->user()->id,
            'title' => $slug,
        ]);
        $request->merge(['price' => str_replace('.', '', $request->price)]);
        $request->merge(['seller_id' => $seller->id]);
        $request->merge(['slug' => $slug]);
        $request->merge(['status' => 1]);

        Post::create($request->input());

        return back()->with('message', ['success', __('Aviso publicado con éxito')]);
    }

    public function communes(Request $request)
    {
        $communes = Commune::where('region_id', $request->get('id'))
            ->orderBy('name')
            ->get();

        $output = [];
        foreach ($communes as $comune) {
            $output[$comune->id] = $comune->name;
        }
        return $output;
    }

}
