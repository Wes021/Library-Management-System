<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Book_category;
use Illuminate\Http\Request;

class CategoryManagment extends Controller
{

    public function AddCategory(Request $request)
    {

        $validated = $request->validate([
            'category_name' => 'required',
        ]);

        do {
            $randomId = random_int(10, 99);
        } while (Book::where('book_id', $randomId)->exists());

        $category=Book_category::create([
            'book_category_id' => $randomId,
            'book_category' => $validated['category_name'],
        ]);

        if($category){
            return redirect()->back()->with('success', 'Category '+$validated['category_name'] +' Added successfully!');
        }else{
            return redirect()->back()->with('error', 'Add Category Faild!');
        }

    }


    public function DisplayCategories()
    {

        $book_categories = Book_category::all();

        return view('Admin(employee).LanguagesCategoriesManagment.Categories.DisplayCategories', compact('book_categories'));
    }

    public function EditForm($book_category_id)
    {
        $book_category = Book_category::findOrFail($book_category_id);

        return view('Admin(employee).LanguagesCategoriesManagment.Categories.UpdateCategories', compact('book_category'));
    }

    public function UpdateCategory(Request $request, $book_category_id)
    {
        $book_category = Book_category::findOrFail($book_category_id);

       $category=$book_category->update([
            'book_category' => $request->book_category,
        ]);


        if($category){
            return redirect()->back()->with('success', 'Category updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Category Update Faild!');
        }
    }

    public function DeleteCategory($book_category_id)
    {
        $book_category = Book_category::findOrFail($book_category_id);

        if ($book_category->delete()) {
            return redirect()->route('DisplayCategories')->with('success', 'Category Deleted successfully!');
        } else {
            return redirect()->route('DisplayCategories')->with('error', 'Category Deletetion failed!');
        }
    }
}
