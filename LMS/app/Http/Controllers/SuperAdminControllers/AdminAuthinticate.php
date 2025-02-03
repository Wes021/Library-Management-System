<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthinticate extends Controller
{


    public function AdminSignin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin=Admin::Where('email',$validated['email'])->first();

        if($admin && Hash::check($validated['password'], $admin->password)){
            Auth::login($admin);
            return redirect()->route('addadmin');
        }
    }

   


    public function Addadmin(Request $request){
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
    } while (Admin::where('admin_id', $randomId)->exists());
    

    Admin::create([
        'admin_id' => $randomId,  // Ensure this is assigned
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'phone_number' => $validated['phone_number'],
        'gender' => 'Not Specified', // Default value to avoid NULL error
        
    ]);
}
}
