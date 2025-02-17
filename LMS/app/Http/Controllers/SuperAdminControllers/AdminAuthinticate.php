<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class AdminAuthinticate extends Controller
{


    public function AdminSignin(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the admin by email
        $admin = Admin::where('email', $validated['email'])->first();

        if ($admin && Hash::check($validated['password'], $admin->password)) {
            // Check the role of the admin
            $adminRole = (int) $admin->role_id;

            // Log the admin in based on their role
            if ($adminRole == 1) {
                Auth::login($admin);
                return redirect()->route('SuperAdminDashboard');
            } elseif ($adminRole == 2) {
                Auth::login($admin);
                return redirect()->route('AdminDashboard');  // Replace with appropriate route for admin
            } elseif ($adminRole == 3) {
                Auth::login($admin);
                return redirect()->route('ManagerDashboard');  // Replace with appropriate route for manager
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['error' => "You don't have access to the system."]);
            }
        } else {
            // Invalid login attempt
            return redirect()->back()->withErrors(['error' => 'Invalid email or password.']);
        }
    }

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

            // Store admin information in the session
            $request->session()->put('superAdminData', [
                'admin_id' => $admin->admin_id,  // Ensure 'admin_id' matches your DB column
                'name' => $admin->name,
                'email' => $admin->email,
                'gender' => $admin->gender,
                'phone_number' => $admin->phone_number,
            ]);

            // Redirect to the Super Admin Dashboard
            return redirect()->route('SuperAdminDashboard');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }


    public function SuperAdminInfo(Request $request)
    {
        // Get the super admin data from session
        $superadmin = $request->session()->get('superAdminData');

        // Check if the data exists, and if not, redirect to login
        if (!$superadmin) {
            return redirect()->route('logingggg')->withErrors(['error' => 'Please log in first.']);
        }

        // Pass the session data to the view
        return view('SuperAdmin.dashboard', compact('superadmin'));
    }


    public function SuperAdminEditForm($admin_id) {}

    public function SuperAdminlogout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->forget('superAdminData');
        return redirect()->route('/');
    }
}
