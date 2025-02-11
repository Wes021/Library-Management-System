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

        Book_category::create([
            'book_category_id' => $randomId,
            'book_category' => $validated['category_name'],
        ]);
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

        $book_category->update([
            'book_category' => $request->book_category,
        ]);
    }

    public function DeleteCategory($book_category_id)
    {
        $book_category = Book_category::findOrFail($book_category_id);

        if ($book_category->delete()) {
            return redirect()->route('DisplayCategories');
        } else {
            echo "Deletion procsses has faild";
        }
    }
}
