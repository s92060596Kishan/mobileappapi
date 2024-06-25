<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (Hash::check($request->password, $user->password)) {
            // Include password in the response
            return response()->json(['user' => $user->toArray()], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'nullable|string|min:6', // Password is optional
        ]);

        // Find the user by ID
        $user = User::find($id);

        // Update user data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Update password if provided
        if ($request->has('password')) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        // Return updated user data
        return response()->json(['user' => $user], 200);
    }

}
