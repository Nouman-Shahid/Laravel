<?php

namespace App\Http\Controllers;

use App\Models\Message; // Make sure this matches your model
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);


        Message::create([

            'message' => $request->message,
        ]);

        return redirect()->route('groups');
    }
}
