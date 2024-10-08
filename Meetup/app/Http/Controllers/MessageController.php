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
        $user = Auth::user(); // Get the authenticated user

        $request->validate([
            'message' => 'required|string',
        ]);

        Message::create([
            'message' => $request->message,
            'group_code' => 'Zx9YvT1Nvl',
            'user_id' => $userId,
            'user_name' => $user->name, // Access the name attribute directly
        ]);

        return redirect()->back();
    }
}
