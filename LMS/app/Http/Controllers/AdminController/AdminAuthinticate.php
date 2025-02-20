<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthinticate extends Controller
{
    public function AdmineSignin(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the admin by email
        $admin = Admin::where('email', $validated['email'])->first();

        if ($admin && Hash::check($validated['password'], $admin->password)) {

            Auth::guard('employee')->login($admin);

            return redirect()->route('AdminDashboard');
        } else {
            return back()->with(['error' => 'Your Email or password is incorrect']);//alert
        }
    }




    public function AdminInfo(Request $request)
    {

        $admin = DB::table('Admin')
            ->where('admin_id', Auth::guard('employee')->user()->admin_id)
            ->leftJoin('roles', 'Admin.role_id', '=', 'roles.role_id')
            ->select('admin.*', 'roles.role_name')
            ->first();

        return view('Admin(employee).AdminDashboard', compact('admin'));
    }


    public function AdminLogout(Request $request)
    {
        Auth::guard('employee')->logout();
        $request->session()->forget('AdminData');
        return redirect()->route('/');
    }


    public function EditAdminInfo(Request $request) {}
}
