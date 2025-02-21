<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleManagment extends Controller
{
    public function AddRole(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|unique:roles,role_name',
        ]);



        $role=Role::create([

            'role_name' => $validated['role_name']
        ]);

        if($role){
            return redirect()->back()->with('success', 'Role '.$validated['role_name'].' Successfully!');
        }else{
            return redirect()->back()->with('error', 'Role '.$validated['role_name'].' Add Faild!');
       }
    }


    public function DisplayRoles()
    {
        $roles = DB::table('roles')
            ->select('roles.*')
            ->get();

        return view('SuperAdmin.RolesManagment.DisplayRoles', compact('roles'));
    }

    public function EditRoleForm($role_id)
    {
        $role = Role::findOrFail($role_id);

        return view('SuperAdmin.RolesManagment.EditRole', compact('role'));
    }

    public function UpdateRole(Request $request, $role_id)
    {
        $role = Role::findOrFail($role_id);

        $role=$role->update([
            'role_name' => $request->role_name
        ]);


        if($role){
            return redirect()->route('DisplayRoles')->with('success', 'Role Updated Successfully!');
       }else{
            return redirect()->route('DisplayRoles')->with('error', 'Role Update Failed!');
       }
    }

    public function RemoveRole($role_id)
    {
        $role = Role::findOrFail($role_id);

        if($role){
            return redirect()->back()->with('success', 'Role Deleted Successfully!');
       }else{
            return redirect()->back()->with('error', 'Role Deletion Failed!');
       }
    }
}
