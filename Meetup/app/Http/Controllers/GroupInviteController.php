<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\GroupInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupInviteController extends Controller
{
    public function invite($invited_userId, $groupcode)
    {
        $userId = Auth::id();
        $user = User::find($userId);


        GroupInvite::create([

            'accepted' => false,
            'invited_by' => $user->email,
            'invited_user_id' => $invited_userId,
            'group_code' => $groupcode,
            'created_at' => now(),
        ]);

        return redirect()->route('searchUser');
    }
    public function showInvite()
    {
        $userId = Auth::id();

        $data = GroupInvite::join('users', 'group_invitation.invited_user_id', '=', 'users.id')
            ->join('group', 'group_invitation.group_code', '=', 'group.code')
            ->where('group_invitation.invited_user_id', $userId)
            ->select(
                'group_invitation.*',
                'users.name as username',
                'users.email',
                'group.name as groupname',
                'group.groupimage',
                'group.created_by'
            )
            ->get();

        return Inertia::render('Dashboard', ['data' => $data]);
    }

    public function showNotification($id)
    {
        $userId = Auth::id();

        $notificationList
            = GroupInvite::join('users', 'group_invitation.invited_user_id', '=', 'users.id')
            ->join('group', 'group_invitation.group_code', '=', 'group.code')
            ->where('group_invitation.id', $id)
            ->select(
                'group_invitation.*',
                'users.name as username',
                'users.email',
                'group.name as groupname',
                'group.groupimage',
                'group.created_by'
            )
            ->get();

        $data = GroupInvite::join('users', 'group_invitation.invited_user_id', '=', 'users.id')
            ->join('group', 'group_invitation.group_code', '=', 'group.code')
            ->where('group_invitation.id', $id)
            ->select(
                'group_invitation.*',
                'group.name as groupname',
                'group.groupimage',
                'group.created_by'
            )
            ->first();
        return Inertia::render('Invite', ['notificationsData' => $data, 'notificationList' => $notificationList]);
    }
}
