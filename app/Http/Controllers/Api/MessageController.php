<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResourse;

class MessageController extends Controller
{
    public function index()
    {
        $message = Message::where('type', 'page')->first();

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Message data fetched successfully',
            'message' => new MessageResourse($message)

        ]);
    }
}
