<?php

namespace App\Http\Controllers\Api;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Category; 

class ClientController extends Controller
{
    public function index()
    {
        $client = Category::where('type', 'page')->first();
        $clients = Category::active()->with('pages')->where('type', 'post')->whereNull('parent_id')->get();


        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Client   data get',
            'client' => new ClientResource($client),
            'clients' => ClientResource::collection($clients)

        ]);
    }
}
