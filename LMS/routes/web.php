<?php

use App\Http\Controllers\AdminControllers\AdminAuthinticate as AdminControllersAdminAuthinticate;
use App\Http\Controllers\SuperAdminControllers\AdminAuthinticate;
use App\Http\Controllers\UserController\userAccount;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminRoleMiddleware;
// Route::get('/', function () {
//     return view('LoginSignin.login');
// });

// Route::get('/signin', function () {
//     return view('LoginSignin.signup');
// });

Route::get('/signup',[userAccount::class,'SignUp'])->name('signup');

Route::post('/signin',[userAccount::class,'SignIn'])->name('signin');

Route::get('/dashboard',[userAccount::class, 'UserDashboard'])->name('dashboard');

Route::get('/login', function () {
    return view('SuperAdmin.Adminsignin');
})->name('login');

Route::get('/Addadmin', function () {
    return view('SuperAdmin.addadmin');
})->name('Addadmin');

Route::get('/AddAdmin',[AdminAuthinticate::class,'AddAdmin'])->name('AddAdmin');

Route::get('/AdminSignin',[AdminAuthinticate::class, 'AdminSignin'])->name('AdminSignin');





