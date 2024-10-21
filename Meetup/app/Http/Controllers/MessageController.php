<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Group;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request, $code)
    {
        $groupdata = Group::where('code', $code)->first();
        $userId = Auth::id();
        $user = Auth::user();

        $request->validate([
            'message' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,txt,pdf|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1000',
        ]);

        $messageData = [
            'message' => $request->message,
            'group_code' => $groupdata->code,
            'user_id' => $userId,
            'user_name' => $user->name,
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            $messageData['file'] = $request->file('file')->store('files');
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $messageData['image'] = $request->file('image')->store('images');
        }

        Message::create($messageData);

        return redirect()->back();
    }
}
