<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Book_category;
use Illuminate\Http\Request;

class CategoryManagment extends Controller
{

    public function AddCategory(Request $request){

    }


    public function DisplayCategories(){
        
        $book_categories=Book_category::all();

        return view('Admin(employee).LanguagesCategoriesManagment.Categories.DisplayCategories', compact('book_categories'));

    }

    public function EditForm($book_category_id){
        $book_category=Book_category::findOrFail($book_category_id);

        return view('Admin(employee).LanguagesCategoriesManagment.Categories.UpdateCategories', compact('book_category'));
    }

    public function UpdateCategory(Request $request ,$book_category_id){
        $book_categories=Book_category::findOrFail($book_category_id);

        $book_categories->update([
            'book_category'=>$request->book_category,
        ]);
    }
}
