<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function storeGroupData(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'groupimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userId = Auth::id();
        $randomString = Str::random(10);

        $path = null;
        if ($request->hasFile('groupimage')) {
            $path = $request->file('groupimage')->store('group_images', 'public');
        }


        Group::create([
            'name' => $request->name,
            'groupimage' => $path,
            'created_by' => $userId,
            'code' => $randomString,
            'created_at' => now(),
        ]);

        // $data = Group::where('created_by', $userId)->all();

        return redirect()->route('groups');
    }


    public function showGroupData()
    {
        $userId = Auth::id();

        $data = Group::where('created_by', $userId)->get();

        return Inertia::render('ChatRoom', ['data' => $data]);
    }
    public function showSingleGroupData($code)
    {
        $userId = Auth::id();

        // Retrieve all messages created by the user
        $messages = Group::where('created_by', $userId)->get(); // Assuming this is a collection of messages
        // Retrieve a specific group by code
        $group = Group::where('code', $code)->first();

        return Inertia::render('SingleChat', ['messages' => $messages, 'data' => $group]);
    }
}
