<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class userAccount extends Controller
{



    public function SignUp(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:user,email',
            'password' => 'required',
            'phone_number' => 'required|unique:user,phone_number',
            'gender' => 'required',
            'profile_picture' => ''
        ]);

        // Generate a unique user_id
        do {
            $randomId = random_int(100, 999);
        } while (User::where('user_id', $randomId)->exists());

        // Create the new user
        $newuser = User::create([
            'user_id' => $randomId,  // Ensure this is assigned
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone_number'],
            'gender' => $validated['gender'], // Default value to avoid NULL error
            'profile_picture' => $validated['profile_picture'],  // Allow null for now
        ]);

        if ($newuser) {
            return redirect()->route('/');
        } else {
            return redirect()->back();
        }
    }



    public function SignIn(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            Auth::login($user);

            $request->session()->put('user_data', [
                'user_id' => $user->user_id,
                'name' => $user->name,
                'email' => $user->email,
                'gender' => $user->gender,
                'phone_number' => $user->phone_number,
                'profile_picture' => $user->profile_picture

            ]);

            return redirect()->route('/');
        } else {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
    }


    public function UserDashboard(Request $request)
    {
        // Retrieve user data from session
        $user = $request->session()->get('user_data');

        return view('user.dashboard', compact('user'));
    }



    public function UserEditForm($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('user.UserEditForm', compact('user'));
    }


    public function UpdateUser(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'nullable|string|in:Male,Female,Not Added',
            'phone_number' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|string|url',
        ]);

        if ($user->update($validatedData)) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('success', 'Profile updated successfully!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('user');
        return redirect()->route('/');
    }


    public function DeleteUserAccount($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->delete()) {
            return redirect()->route('/');
        }
    }
}
