<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CounterResource;

class CounterController extends Controller
{
    public function index()
    {
        $counter = Client::where('type', 'page')->first();
        $counters = Client::where('type', 'post')->oldest()->take(3)->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Counter Data get successfully',
            'counter' => new CounterResource($counter),
            'counters' => CounterResource::collection($counters)
        ]);
    }
}
