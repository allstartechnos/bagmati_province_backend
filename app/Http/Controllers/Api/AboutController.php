<?php

namespace App\Http\Controllers\Api;

use App\Models\AboutUs;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\DocumentResource;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutUs::where('type', 'page')->first();
        $abouts = AboutUs::active()->where('type', 'post')->get();
        $document = Document::where('type', 'page')->first();
        $documents = Document::active()->where('type', 'post')->take(4)->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'About data get',
            'about' => new AboutResource($about),
            'abouts' => AboutResource::collection($abouts),
            'document' => new DocumentResource($document),
            'documents' => DocumentResource::collection($documents),
            // 'img_path' => asset('images/')
        ]);
    }
}
