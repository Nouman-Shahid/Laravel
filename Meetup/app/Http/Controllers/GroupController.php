<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Group;
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

        $path = null;
        if ($request->hasFile('groupimage')) {
            $path = $request->file('groupimage')->store('group_images', 'public');
        }

        Group::create([
            'name' => $request->name,
            'groupimage' => $path,
            'created_by' => $userId,
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
    public function showSingleGroupData($id)
    {
        $userId = Auth::id();

        $data = Group::where('id', $id)->get();

        return Inertia::render('ChatRoom', ['messages' => $data]);
    }
}
