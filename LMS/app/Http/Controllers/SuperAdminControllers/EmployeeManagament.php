<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeManagament extends Controller
{
    //AddAdmin

    public function AddEmployee(Request $request){
        // Validate request data
    $validated = $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|email|unique:user,email',
        'password' => 'required',
        'role'=>'required',
        'gender'=>'required',
        'phone_number' => 'required|unique:user,phone_number',
        
    ]);

    // Generate a unique user_id
    do {
        $randomId = random_int(100, 999);
    } while (Admin::where('admin_id', $randomId)->exists());
    

    Admin::create([
        'admin_id' => $randomId,
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role_id'=>$validated['role'],
        'gender' => $validated['gender'],
        'phone_number' => $validated['phone_number'],
    ]);
}
}
