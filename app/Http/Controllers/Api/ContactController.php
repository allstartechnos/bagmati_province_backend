<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email|',
            'phone' => 'required|integer',
            'message' => 'required|string|max:250'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'validation_errors' => $validator->messages(),
                'message' => 'All input fields are mandatory',
            ]);
        } else {
            $contact = Contact::create($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'You have successfully completed data.'
            ]);
        }
    }
}
