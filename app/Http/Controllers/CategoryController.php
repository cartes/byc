<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::withCount('posts')
            ->with('childrenRecursive')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('categories.list', compact('categories'));
    }

    public function store(Request $category_request)
    {
        Category::create($category_request->input());

        return back()->with('message', ['success', __('Categoría guardada con éxito')]);
    }

    public function destroy(Request $request)
    {
        foreach ($request->id as $id) {
            Category::destroy($id);
        }

        return back()->with('message', ['success', __('Las categorías fueron eliminadas')]);
    }
}
