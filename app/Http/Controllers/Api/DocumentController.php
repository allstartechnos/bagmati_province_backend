<?php

namespace App\Http\Controllers\Api;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentResource;

class DocumentController extends Controller
{
    public function index()
    {
        
        $document = Document::where('type', 'page')->first();
        $documents = Document::active()->where('type', 'post')->take(4)->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Legal Document data get', 
            'document' => new DocumentResource($document),
            'documents' => DocumentResource::collection($documents),
            // 'img_path' => asset('images/')
        ]);
    }
}
