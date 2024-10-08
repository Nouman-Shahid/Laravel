<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        $user = Auth::user();

        // Validate the incoming request
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Create the message
        Message::create([
            'message' => $request->message,
            'group_code' => 'Zx9YvT1Nvl', // Adjust if necessary
            'user_id' => $userId,
            'user_name' => $user->name,
        ]);

        return redirect()->back();
    }
}
