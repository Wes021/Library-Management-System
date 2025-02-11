<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthinticate extends Controller
{


    public function AdminSignin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::Where('email', $validated['email'])->first();
        $adminId = $admin->admin_id;
        $adminRole = $admin->role_id;
        if ($admin && Hash::check($validated['password'], $admin->password)) {
            $adminId = $admin->admin_id;
            $adminRole = (int) $admin->role_id;
            Auth::login($admin);

            if ($adminRole == 1) {
                echo "super Admin";
            } elseif ($adminRole == 2) {
                echo "Admin";
            } elseif ($adminRole == 3) {
                echo "not assigned";
            } else {
                Auth::logout();
                echo "can't access";
            }
        } else {
            echo "Invalid email or password";
        }
    }
}
