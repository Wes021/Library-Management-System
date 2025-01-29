<?php

use App\Http\Controllers\UserController\userAccount;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LoginSignin.login');
});

Route::get('/signup',[userAccount::class,'SignUp'])->name('signup');

Route::post('/signin',[userAccount::class,'SignIn'])->name('signin');
