<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesManagment extends Controller
{
    public function AddLanguage(Request $request)
    {

        $validated = $request->validate([
            'language_name' => 'required',
        ]);

        do {
            $randomId = random_int(10, 99);
        } while (Language::where('language_id', $randomId)->exists());

        Language::create([
            'language_id' => $randomId,
            'language_name' => $validated['language_name'],
        ]);
    }


    public function DisplayLanguages()
    {

        $languages = Language::all();

        return view('Admin(employee).LanguagesCategoriesManagment.Languagess.DisplayLanguages', compact('languages'));
    }

    public function EditForm($language_id)
    {
        $language = Language::findOrFail($language_id);

        return view('Admin(employee).LanguagesCategoriesManagment.Languagess.UpdateLangages', compact('language'));
    }

    public function UpdateLanguages(Request $request, $language_id)
    {
        $request->validate([
            'language_name' => 'required|string|max:255',
        ]);

        $language = Language::findOrFail($language_id);



        $language->update([
            'language_name' => $request->language_name,
        ]);
    }


    public function DeleteLanguage($language_id)
    {
        $language = Language::findOrFail($language_id);

        if ($language->delete()) {
            return redirect()->route('DisplayCategories');
        } else {
            echo "Deletion procsses has faild";
        }
    }
}
