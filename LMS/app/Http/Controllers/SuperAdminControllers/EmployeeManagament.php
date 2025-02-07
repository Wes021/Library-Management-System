<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeManagament extends Controller
{
    
    public function DisplayEmployee(){
        $employees=DB::table('Admin')
        ->leftJoin('roles','Admin.role_id','=','roles.role_id')
        ->select('Admin.*','roles.role_name as role_name')
        ->get();

        return view('SuperAdmin.EmployeeMagagment.DisplpayEmployee',compact('employees'));
    }
    
    public function EditForm($admin_id){
        $admin=Admin::findOrFail($admin_id);
        return view('SuperAdmin.EmployeeMagagment.EditEmployee', compact('admin'));
    }

    public function UpdateEmployee(Request $request, $admin_id){
        $admin = Admin::findOrFail($admin_id);

        $admin->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'role_id'=>$request->role_id,
        'gender'=>$request->gender,
        'phone_number'=>$request->phone_number,
        ]);
    }


    public function DeleteEmployee($admin_id){
        $employee=Admin::findOrFail($admin_id);

        if($employee->delete()){
            return redirect()->route('DisplayEmployees');
        }else{
            echo "Deletion procsses has faild";
        }
    }

    

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
