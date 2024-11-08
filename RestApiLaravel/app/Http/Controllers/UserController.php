<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();

        return response()->json([
            'results' => $user

        ], 200);
    }
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {

            return response()->json([
                'message' => 'User not Found'

            ], 404);
        }

        return response()->json([
            'results' => $user

        ], 200);
    }

    public function store(UserStoreRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return response()->json([
                'message' => 'Successfully created'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage() // Return the exception message
            ], 500); // Optional: Set HTTP status code to 500
        }
    }
}
