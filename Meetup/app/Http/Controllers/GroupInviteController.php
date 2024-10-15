<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\GroupInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupInviteController extends Controller
{
    public function invite($invited_userId, $groupcode)
    {
        $userId = Auth::id();

        GroupInvite::create([

            'accepted' => false,
            'invited_by' => $userId,
            'invited_user_id' => $invited_userId,
            'group_code' => $groupcode,
            'created_at' => now(),
        ]);

        return redirect()->route('searchUser');
    }
    public function showInvite()
    {
        $userId = Auth::id();

        $data = GroupInvite::where('invited_user_id', $userId)->get();

        return Inertia::render('Dashboard', ['data' => $data]);
    }
}
