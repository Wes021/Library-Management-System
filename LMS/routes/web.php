<?php

use App\Http\Controllers\AdminController\BookManagament;
use App\Http\Controllers\AdminController\CategoryManagment;
use App\Http\Controllers\AdminController\LanguagesManagment;
use App\Http\Controllers\AdminControllers\AdminAuthinticate as AdminControllersAdminAuthinticate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminControllers\EmployeeManagament;
use App\Http\Controllers\SuperAdminControllers\AdminAuthinticate;
use App\Http\Controllers\SuperAdminControllers\RoleManagment;
use App\Http\Controllers\SuperAdminControllers\UserManagament;
use App\Http\Controllers\UserController\userAccount;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminRoleMiddleware;
// Route::get('/', function () {
//     return view('LoginSignin.login');
// });

// Route::get('/signin', function () {
//     return view('LoginSignin.signup');
// });

Route::get('/userlogin', function () {
    return view('user.signin');
})->name('userlogin');

Route::get('/usersignup', function () {
    return view('user.signup');
})->name('usersignup');

Route::get('/signup',[userAccount::class,'SignUp'])->name('signup');

Route::post('/signin',[userAccount::class,'SignIn'])->name('signin');

Route::post('/logout', [userAccount::class, 'logout'])->name('logout');


Route::get('/dashboard',[userAccount::class, 'UserDashboard'])->name('dashboard');

Route::get('/login', function () {
    return view('SuperAdmin.Adminsignin');
})->name('login');

Route::get('/Addadmin', function () {
    return view('SuperAdmin.addadmin');
})->name('Addadmin');

Route::get('/AddAdmin',[EmployeeManagament::class,'AddEmployee'])->name('AddEmployee');

Route::get('/AdminSignin',[AdminAuthinticate::class, 'AdminSignin'])->name('AdminSignin');







Route::get('/Addbook', function () {
    return view('Admin(employee).BookManagament.addbook');
})->name('Addbook');

Route::get('/AddBooks', [BookManagament::class, 'AddBook'])->name('AddBook');

Route::get('books/{book_id}/edit',[BookManagament::class,'EditForm'])->name('EditForme');

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




////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/DisplayLanguages',[LanguagesManagment::class,'DisplayLanguages'])->name('DisplayLanguages');

Route::get('books/{language_id}/editlanguages',[LanguagesManagment::class,'EditForm'])->name('EditLanguageForm');

Route::post('books/{language_id}/updatelanguages',[LanguagesManagment::class,'UpdateLanguages'])->name('UpdateLanguages');



Route::get('/AddLanguage',[LanguagesManagment::class,'AddLanguage'])->name('AddLanguage');

Route::get('/Addlanguage', function () {
    return view('Admin(employee).LanguagesCategoriesManagment.Languagess.AddLanguage');
})->name('Addlanguage');

Route::get('books/{language_id}/deletelanguage',[LanguagesManagment::class,'DeleteLanguage'])->name('DeleteLanguage');



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/DisplayEmployees',[EmployeeManagament::class,'DisplayEmployee'])->name('DisplayEmployees');

Route::get('employees/{admin_id}/editemployee',[EmployeeManagament::class,'EditForm'])->name('EditEmployees');

Route::post('employees/{admin_id}/updateemployee',[EmployeeManagament::class,'UpdateEmployee'])->name('UpdateEmployee');

Route::get('employees/{admin_id}/deleteemployee',[EmployeeManagament::class,'DeleteEmployee'])->name('DeleteEmployee');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::get('/AddRoles', [RoleManagment::class, 'AddRole'])->name('AddRole');

Route::get('roles/{role_id}/editrole',[RoleManagment::class,'EditRoleForm'])->name('EditRoleForm');

Route::post('/role/{role_id}/updaterole', [RoleManagment::class, 'UpdateRole'])->name('UpdateRole');

Route::get('/DisplayRoles',[RoleManagment::class, 'DisplayRoles'])->name('DisplayRoles');

Route::get('/DeleteRoles/{role_id}/delete',[RoleManagment::class, 'RemoveRole'])->name('DeleteRoles');

Route::get('/Addrole', function () {
    return view('SuperAdmin\RolesManagment\AddRole');

})->name('Addrole');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::get('users/{user_id}/edituser',[UserManagament::class,'EditUserForm'])->name('EditUserForm');

Route::post('/users/{user_id}/updateuser', [UserManagament::class, 'UpdateStatus'])->name('UpdateStatus');

Route::get('/DisplayUsers',[UserManagament::class, 'DisplayUsers'])->name('DisplayUsers');

Route::get('/DeleteUser/{user_id}/delete',[UserManagament::class, 'RemoveUser'])->name('RemoveUser');


// Route::get('/', function () {
//     return view('Home');
// });

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('books/{book_id}/bookdetail', [HomeController::class,'BookDetails'])->name('BookDetails');