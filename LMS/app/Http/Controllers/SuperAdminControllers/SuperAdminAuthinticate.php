<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class SuperAdminAuthinticate extends Controller
{



    public function SuperAdminSignin(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the admin by email
        $admin = Admin::where('email', $validated['email'])->first();

        if ($admin && Hash::check($validated['password'], $admin->password)) {
            // Log the admin in using the admin guard
            Auth::guard('admin')->login($admin);

            // Redirect to the Super Admin Dashboard
            return redirect()->route('SuperAdminDashboard');
        } else {
            return back()->with(['error' => 'Your Email or password is incorrect']);//alert
        }
    }


    public function SuperAdminInfo(Request $request)
    {
        

        $superadmin = DB::table('Admin')
            ->where('admin_id', Auth::guard('admin')->user()->admin_id)
            ->leftJoin('roles', 'Admin.role_id', '=', 'roles.role_id')
            ->select('admin.*', 'roles.role_name')
            ->first();

        // Check if the data exists, and if not, redirect to login
        if (!$superadmin) {
            return redirect()->route('logingggg')->withErrors(['error' => 'Please log in first.']);
        }

        // Pass the session data to the view
        return view('SuperAdmin.dashboard', compact('superadmin'));
    }


    public function SuperAdminEditForm($admin_id) {}

    public function SuperAdminlogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->forget('superAdminData');
        return redirect()->route('/');
    }
}
