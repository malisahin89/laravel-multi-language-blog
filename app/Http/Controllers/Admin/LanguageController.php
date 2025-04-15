<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:languages,slug',
            'flag' => 'nullable',
            'status' => 'boolean',
            'is_default' => 'boolean',
        ]);

        if ($request->is_default) {
            Language::where('is_default', true)->update(['is_default' => false]);
        }

        Language::create($request->all());

        return redirect()->route('languages.index')->with('success', 'Language created successfully.');
    }

    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('admin.languages.edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:languages,slug,' . $language->id,
            'flag' => 'nullable',
            'status' => 'boolean',
            'is_default' => 'boolean',
        ]);

        if ($request->is_default) {
            Language::where('is_default', true)->update(['is_default' => false]);
        }

        $language->update($request->all());

        return redirect()->route('languages.index')->with('success', 'Language updated successfully.');
    }

    public function destroy($id)
    {
        Language::destroy($id);
        return redirect()->route('languages.index')->with('success', 'Language deleted.');
    }
}
