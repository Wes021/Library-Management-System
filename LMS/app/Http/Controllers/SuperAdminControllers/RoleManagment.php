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



        Role::create([

            'role_name' => $validated['role_name']
        ]);
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

        $role->update([
            'role_name' => $request->role_name
        ]);
    }

    public function RemoveRole($role_id)
    {
        $role = Role::findOrFail($role_id);
        if ($role->delete()) {
            return redirect()->back();
        }
    }
}
