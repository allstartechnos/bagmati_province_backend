<?php

namespace App\Http\Controllers\Api;

use App\Models\JobsDemand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DemandCategoryResource;

class DemandCategoryController extends Controller
{
    public function index()
    {
        $demand = JobsDemand::where('type', 'page')->first();
        $demands = JobsDemand::active()->with('pages')->where('type', 'post')->whereNull('parent_id')->get();


        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'demand category data get',
            'demand' => new DemandCategoryResource($demand),
            'demands' => DemandCategoryResource::collection($demands)

        ]);
    }
}
