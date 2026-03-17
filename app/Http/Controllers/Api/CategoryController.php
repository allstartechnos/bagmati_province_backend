<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::where('type', 'page')->first();
        $categories = Category::active()->where('type', 'post')->take(4)->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Category data get',
            'category' => new CategoryResource($category),
            'categories' => CategoryResource::collection($categories),
            // 'img_path' => asset('images/')
        ]);
    }

    public function show($slug)
    {
        $category = Category::with('pages')->where('slug', $slug)->first();
        // $photos = $category->pages;
        return response()->json([
            'status' => 200,
            // 'pages' => $photos,
            'category' => $category
        ]);
    }
}
