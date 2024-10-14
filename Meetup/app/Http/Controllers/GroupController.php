<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Group;
use App\Models\Message;
use App\Models\User;
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

        $groupdata = Group::where('code', $code)->first();
        $data = Group::where('created_by', $userId)->get();
        $count = Message::distinct('user_id')->count('created_by');
        $totalusers = Message::distinct('user_id')->get();
        // Fetch all messages in the group
        $messages = Message::where('group_code', $code)
            ->orderBy('created_at', 'asc')
            ->get();

        return Inertia::render('SingleChat', [
            'groupdata' => $groupdata,
            'grouplist' => $data,
            'initialMessages' => $messages, // Pass messages as initialMessages
            'userId' => $userId,
            'count' => $count,
            'totalusers' => $totalusers,
        ]);
    }


    public function search(Request $request)
    {
        $validated = $request->validate([
            'member_name' => 'required|string',
        ]);

        $user_name = $validated['member_name'];
        $results = User::where('name', 'like', "%{$user_name}%")->get();
        $count = $results->count();

        return redirect()->route('dashboard')->with([
            'results' => $results,
            'searchcount' => $count,
        ]);
    }
    public function searchUser()
    {
        return Inertia::render('SearchUser');
    }
}
