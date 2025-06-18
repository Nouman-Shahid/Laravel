<?php

namespace App\Http\Controllers;

use App\Models\CompletedNotes;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class NotesController extends Controller
{

    public function get()
    {
        $user = Auth::user();

        $notes = Notes::where('user_id', '=', $user->id)->orderBy('id')->get();

        return Inertia::render('Dashboard', ['notes' => $notes]);
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'title' => 'required|string|min:1|max:100',
            'content' => 'required|string|min:1|max:300',
            'color' => ['nullable', 'string', Rule::in(['eec6d2', 'c8c6ee', 'eceec6', 'c6eee7', 'f9ddff'])],
        ]);

        Notes::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user->id,
            'color' => $request->color
        ]);

        return Redirect::back();
    }

    public function completed($id)
    {
        $user = Auth::user();


        Notes::where('id', $id)->update([
            'iscompleted' => 'true',
        ]);

        CompletedNotes::create([

            'user_id' => $user->id,
            'notes_id' => $id,
            'created_at' => now()

        ]);

        return Redirect::back();
    }

    public function remove($id)
    {
        Notes::where('id', $id)->delete();

        return Redirect::back();
    }




    public function getCompleted()
    {
        $user = Auth::user();

        $notes = Notes::where('user_id', '=', $user->id)
            ->where('iscompleted', '=', 'true')->orderBy('id')->get();

        return Inertia::render('CompletedNotes', ['notes' => $notes]);
    }
    public function getPending()
    {
        $user = Auth::user();

        $notes = Notes::where('user_id', '=', $user->id)
            ->where('iscompleted', '=', null)->orderBy('id')->get();

        return Inertia::render('PendingNotes', ['notes' => $notes]);
    }
}
