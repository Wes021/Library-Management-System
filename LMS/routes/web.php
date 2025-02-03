<?php

use App\Http\Controllers\AdminControllers\AdminAuthinticate as AdminControllersAdminAuthinticate;
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

Route::get('/login', function () {
    return view('SuperAdmin.Adminsignin');
})->name('login');

// Route::get('/addadmin',[AdminAuthinticate::class,'Addadmin'])->name('addadmin');

Route::get('/adminsigninn',[AdminAuthinticate::class, 'AdminSignin'])->name('adminsigninn');

Route::middleware(['admin_role:not assigned'])->group(function () {
    Route::get('/addadmin', function () {
        return 'Welcome, Super Admin!';
    })->name('addadmin');
});