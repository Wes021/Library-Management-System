<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userAccount extends Controller
{
    public function SignUp(Request $request){
        $validated=request()->validate(
            [
                'name'=>'required|min:3|max:50',
                'email'=>'required|email|unique:user,email',
                'password'=>'required|unique:user,password',
                'gender',
                'phone_number'=>'required|unique:user,phone_number',
                'profile_picture'
            ]
            );

            User::create(
                [
                    'name'=>$validated['name'],
                    'email'=>$validated['email'],
                    'password'=>Hash::make($validated['password']),
                    'gender'=>$validated['gender'],
                    'phone_number'=>$validated['phone_number'],
                    'profile_picture'=>$validated['profile_picture']
                ]
            );
    }


    public function SignIn(Request $request){
        $validated=request()->validate(
            [
                'email'=>'required|email',
                'password'=>'required',
            ]
            );

            if(Auth::attempt($validated)){
                //make session to dashboard
                request()->session()->regenerate();
                //go to login
            }
    }

    public function Logout(){
        Auth::logout();

        request()->session()->invalidate();
        //go to sign in
    }
}
