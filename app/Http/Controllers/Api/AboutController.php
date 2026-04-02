<?php

namespace App\Http\Controllers\Api;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::where('type', 'page')->first();
        $abouts = About::with('posts')
            ->where('type', 'post')
            ->where('status', 0)
            ->whereNull('parent_id')
            ->select('id', 'title', 'sub_title', 'slug', 'image', 'description', 'banner')
            ->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'About data get',
            'about' => $about,
            'abouts' => $abouts,
            // 'img_path' => asset('images/')
        ]);
    }

    public function show($slug)
    {
        $about = About::where('type', 'page')->first();
        $abouts = About::with('posts')
            ->where('type', 'post')
            ->where('status', 0)
            ->whereNull('parent_id')
            ->select('id', 'title', 'sub_title', 'slug', 'image', 'description', 'banner')
            ->get();

        $aboutpost = About::with('posts')
            ->where('type', 'post')
            ->where('status', 0)
            ->whereNull('parent_id')
            ->where('slug', $slug)
            ->select('id', 'title', 'sub_title', 'design', 'slug', 'image', 'description', 'banner')
            ->first();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'About data get',
            'about' => $about,
            'abouts' => $abouts,
            'aboutpost' => $aboutpost,
        ]);
    }
}
