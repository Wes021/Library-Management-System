<?php

namespace App\Http\Controllers\SuperAdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagament extends Controller
{
    public function EditUserForm(Request $request){
        $user=User::table('user')
        ->leftjoin('user_status','user.status','=','user_status.user_status_id')
        ->select('user.*', 'user_status.user_status as user_status')
        ->get();

        return view('','');
    }
}
