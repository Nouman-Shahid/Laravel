<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Group;
use App\Models\Message;
use App\Models\GroupInvite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

        $groupsMadeByUser = Group::where('created_by', $userId)->get();

        $groupsMadeByOtherUser = GroupInvite::join('group', 'group_invitation.group_code', '=', 'group.code')
            ->where('group_invitation.accepted', true)
            ->where('group_invitation.invited_user_id', $userId)
            ->select(
                'group_invitation.*',
                'group.*'
            )
            ->get();

        return Inertia::render('ChatRoom', [
            'groupsMadeByUser' => $groupsMadeByUser,
            'groupsMadeByOtherUser' => $groupsMadeByOtherUser
        ]);
    }
    public function showSingleGroupData($code)
    {
        $userId = Auth::id();

        $groupsMadeByUser = Group::where('created_by', $userId)->get();

        $groupsMadeByOtherUser = GroupInvite::join('group', 'group_invitation.group_code', '=', 'group.code')
            ->where('group_invitation.accepted', true)
            ->where('group_invitation.invited_user_id', $userId)
            ->select(
                'group_invitation.*',
                'group.*'
            )
            ->get();
        $groupdata = Group::where('code', $code)->first();
        $count = Message::where('group_code', $code)->distinct('user_id')->count('user_id');
        $totalusers = Message::where('group_code', $code)->distinct('user_id')->get();
        $messages = Message::where('group_code', $code)
            ->orderBy('created_at', 'asc')
            ->get();

        return Inertia::render('SingleChat', [
            'groupdata' => $groupdata,
            'initialMessages' => $messages,
            'userId' => $userId,
            'count' => $count,
            'totalusers' => $totalusers,
            'groupsMadeByUser' => $groupsMadeByUser,
            'groupsMadeByOtherUser' => $groupsMadeByOtherUser
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
        $userId = Auth::id();

        $data = Group::where('created_by', $userId)->get();
        return Inertia::render('SearchUser', [
            'results' => $results,
            'searchcount' => $count,
            'groupdata' => $data
        ]);
    }
    public function searchUser()
    {
        return Inertia::render('SearchUser');
    }
}
