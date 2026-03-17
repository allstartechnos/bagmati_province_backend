<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {


        return response()->json([
            'time' => now()->timestamp, // 🔥 DEBUG PROOF

            'setting' => Setting::first()->makeHidden(['created_at', 'updated_at', 'created_by', 'updated_by']),

            'contact' => Contact::where('type', 'page')
                ->select('title', 'sub_title', 'image', 'banner')
                ->first(),

            'sliders' => Slider::where('type', 'post')
                ->where('status', 0)
                ->select('id', 'title', 'sub_title', 'image', 'description', 'banner')
                ->get(),

            'about' => AboutUs::where('type', 'page')
                ->select('title', 'sub_title', 'description', 'image', 'banner')
                ->first(),

            'abouts' => AboutUs::where('type', 'post')
                ->where('status', 0)
                ->select('id', 'title', 'sub_title', 'image', 'description', 'banner')
                ->get(),


            'message' => Message::where('type', 'page')
                ->select('id', 'title', 'sub_title', 'description', 'image', 'banner')
                ->first(),

            'category' => Category::where('type', 'page')
                ->select('id', 'title', 'sub_title', 'description', 'image', 'banner')
                ->first(),

            'categories' => Category::with('pages')
                ->whereHas('subCategories')
                ->whereNull('parent_id')
                ->where('type', 'post')
                ->where('status', 0)
                ->select('id', 'title', 'slug', 'sub_title', 'image', 'banner')
                ->orderBy('rank')
                ->get(),

            'newsevents' => Document::where('type', 'post')
                ->where('status', 0)
                ->select('id', 'title', 'sub_title', 'image', 'banner', 'description', 'slug', 'created_at')
                ->latest()
                ->get(),

            'newsevent' => Document::where('type', 'page')
                ->select('id', 'title', 'sub_title', 'description', 'image', 'banner')
                ->first(),

            'teams' => Team::where('type', 'post')
                ->where('status', 0)
                ->select('id', 'title', 'sub_title', 'image', 'description', 'banner')
                ->orderBy('rank')
                ->get(),

            'team' => Team::where('type', 'page')
                ->select('id', 'title', 'sub_title', 'description', 'image', 'banner')
                ->first(),

            'clients' => Client::where('type', 'post')
                ->where('status', 0)
                ->select('id', 'title', 'sub_title', 'image', 'description', 'banner')
                ->latest()
                ->get(),

            'client' => Client::where('type', 'page')
                ->select('id', 'title', 'sub_title', 'description', 'image', 'banner')
                ->first(),


        ], 200, [
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
