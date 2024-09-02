<?php

namespace App\Http\Controllers;

use App\Mail\signupmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class UserController extends BaseController
{
    public function signup(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        Auth::login($user);

        $user = Auth::user();
        $message = <<<EOT
        Welcome to Airplan{$user->name}!

        Hi there,
        Thanks for signing up for AirPlan.
        
        We're thrilled to have you here! Explore our fantastic deals and discounts.

        Best regards,
        The AirPlan Team
        EOT;


        $subject = 'Thanks for signing up for AirPlan.';

        Mail::to($user->email)->send(new signupmail($message, $subject));

        return redirect()->route('user.flights');
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.flights');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('view.home');
    }
}
