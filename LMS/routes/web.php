<?php

use App\Http\Controllers\AdminController\BookManagament;
use App\Http\Controllers\AdminController\CategoryManagment;
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

Route::get('/Addbook', function () {
    return view('Admin(employee).BookManagament.addbook');
})->name('Addbook');

Route::get('/AddBooks', [BookManagament::class, 'AddBook'])->name('AddBook');

Route::get('books/{book_id}/edit',[BookManagament::class,'EditForm'])->name('EditForm');
Route::post('/books/{book_id}/update', [BookManagament::class, 'UpdateBook'])->name('UpdateBook');

Route::get('/DisplayBooks',[BookManagament::class, 'DisplayBooks'])->name('DisplayBooks');

Route::get('/DeleteBook/{book_id}/delete',[BookManagament::class, 'DeleteBook'])->name('DeleteBook');

Route::get('/DisplayCategories',[CategoryManagment::class,'DisplayCategories'])->name('DisplayCategories');

Route::get('books/{book_category_id}/editcategory',[CategoryManagment::class,'EditForm'])->name('EditForm');

Route::post('books/{book_category_id}/updatecategory',[CategoryManagment::class,'UpdateCategory'])->name('UpdateCa');



Route::get('/AddCategory',[CategoryManagment::class,'AddCategory'])->name('AddCategory');

Route::get('/Addcategory', function () {
    return view('Admin(employee)\LanguagesCategoriesManagment\Categories\AddCategory');
})->name('Addcategory');

Route::get('books/{book_category_id}/deletecategory',[CategoryManagment::class,'DeleteCategory'])->name('DeleteCategory');


