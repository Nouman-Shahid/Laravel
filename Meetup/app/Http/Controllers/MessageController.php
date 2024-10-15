<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Group;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request, $code)
    {
        $groupdata = Group::where('code', $code)->first();

        $userId = Auth::id();
        $user = Auth::user();

        // Validate incoming request
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Create the message
        Message::create([
            'message' => $request->message,
            'group_code' => $groupdata->code, // This should not be null
            'user_id' => $userId,
            'user_name' => $user->name,
        ]);

        return redirect()->back();
    }
}
