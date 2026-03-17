<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function index()
    {
        $destination = Destination::where('type', 'page')->first();
        $destinations = Destination::active()->where('type', 'post')->orderBy('rank')->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Destination Data get successfully',
            'destination' => new DestinationResource($destination),
            'destinations' => DestinationResource::collection($destinations)
        ]);
    }
}
