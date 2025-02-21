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

        $language=Language::create([
            'language_id' => $randomId,
            'language_name' => $validated['language_name'],
        ]);
        if($language){
            return redirect()->back()->with('success', 'Language ' . $validated['language_name'] . ' added successfully!');
        }else{
            return redirect()->back()->with('error', 'Language'.$validated['language_name'].' Adding faild!');
        }

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



        $language=$language->update([
            'language_name' => $request->language_name,
        ]);

        if($language){
            return redirect()->route('DisplayLanguages')->with('success', 'Language updated successfully!');
        }else{
            return redirect()->route('DisplayLanguages')->with('error', 'Language update Faild!');
        }


    }


    public function DeleteLanguage($language_id)
    {
        $language = Language::findOrFail($language_id);

        if ($language->delete()) {
            return redirect()->route('DisplayLanguages')->with('success', 'Language Deleted successfully!');
        } else {
            return redirect()->route('DisplayLanguages')->with('success', 'Language Deletetion Faild!');
        }
    }
}
