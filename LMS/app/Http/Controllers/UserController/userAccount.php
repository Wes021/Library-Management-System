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
    ]);

    // Generate a unique user_id
    do {
        $randomId = random_int(100000, 999999);
    } while (User::where('user_id', $randomId)->exists());

    // Create the new user
    User::create([
        'user_id' => $randomId,  // Ensure this is assigned
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'phone_number' => $validated['phone_number'],
        'gender' => 'Not Specified', // Default value to avoid NULL error
        'profile_picture' => null,  // Allow null for now
    ]);
}



public function SignIn(Request $request) {
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $validated['email'])->first();

    if ($user && Hash::check($validated['password'], $user->password)) {
        Auth::login($user);
        
        $request->session()->put('user',[
            'user_id'=>$user->user_id,
            'name'=>$user->name,
            'phone_number'=>$user->phone_number,
            
        ]);

        return redirect()->route('dashboard');

    } else {
        return back()->withErrors(['email' => 'Invalid email or password']);
    }
}


    public function UserDashboard(Request $request){
        $user = $request->session()->get('user');
        return view('user.dashboard', compact('user'));
    }


    public function Logout(){
        Auth::logout();

        request()->session()->invalidate();
        //go to sign in
    }

    public function DeleteAccount(){

    }
}
