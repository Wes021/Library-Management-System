<?php

use App\Http\Controllers\SuperAdminControllers\AdminAuthinticate;
use App\Http\Controllers\UserController\userAccount;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('LoginSignin.login');
// });

// Route::get('/signin', function () {
//     return view('LoginSignin.signup');
// });

Route::get('/signup',[userAccount::class,'SignUp'])->name('signup');

Route::post('/signin',[userAccount::class,'SignIn'])->name('signin');

Route::get('/dashboard',[userAccount::class, 'UserDashboard'])->name('dashboard');

Route::get('/', function () {
    return view('SuperAdmin.addadmin');
});

Route::get('/addadmin',[AdminAuthinticate::class,'Addadmin'])->name('addadmin');