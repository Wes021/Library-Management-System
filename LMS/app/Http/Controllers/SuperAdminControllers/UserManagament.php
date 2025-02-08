<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserManagament extends Controller
{
    public function DisplayUsers(Request $request){
        $users=DB::table('user')
        ->leftjoin('user_status','user.status','=','user_status.user_status_id')
        ->select('user.*', 'user_status.user_status as user_status')
        ->get();

        return view('SuperAdmin.UserManagament.DisplayUsers',compact('users'));
    }


    public function EditUserForm($user_id){
        $user=User::findOrFail($user_id);
        return view('SuperAdmin.UserManagament.UserStatus', compact('user'));
    }


    public function UpdateStatus(Request $request, $user_id){
        $user = User::findOrFail($user_id);

        $user->update([
            'status'=>$request->status,
        ]);

    }

    public function RemoveUser($user_id){
        $user=User::findOrFail($user_id);
        if($user->delete()){
            return redirect()->back();
        }
    }
}