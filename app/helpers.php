<?php

use App\Models\Destination;
use App\Models\Document;
use App\Models\Message;
use App\Models\Team;

// if (!function_exists('documents')) {
//     function documents()
//     {
//         return [
//             'legal_documents' => Document::active()->where('type', 'post')->get(),
//             'document' => Document::where('type', 'page')->firstOrFail(),
//         ];
//     }
// }

if (!function_exists('destinations')) {
    function destinations()
    {
        $destinations = Destination::active()->where('type', 'post')->orderBy('rank')->get();
        return $destinations;
    }
}


if (!function_exists('destination')) {
    function destination()
    {
        $destination = Destination::where('type', 'page')->first();
        return $destination;
    }
}

if (!function_exists('teams')) {
    function teams()
    {
        $teams = Team::active()->where('type', 'post')->orderBy('rank')->get();
        return $teams;
    }
}


if (!function_exists('team')) {
    function team()
    {
        $team = Team::where('type', 'page')->first();
        return $team;
    }
}
