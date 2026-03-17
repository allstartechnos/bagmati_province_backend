<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::where('type', 'page')->first();
        $teams = Team::active()->where('type', 'post')->orderBy('rank')->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Team Data get successfully',
            'team' => new TeamResource($team),
            'teams' => TeamResource::collection($teams)
        ]);
    }
}
