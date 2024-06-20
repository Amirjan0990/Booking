<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestCategory;
use App\Models\Restaurant;

class RestCategoryController extends Controller
{
    public function index()
    {
        $rest_category = RestCategory::all();
        return view('admin.rest_category.index', compact('rest_category'));
    }


    public function create()
    {
        return view('rest_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        RestCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            ]);

        return redirect()->route('rest_category.index')->with('success', 'rest_category created successfully.');
    }

    public function show($id)
    {
        $rest_category = RestCategory::findOrFail($id);
        return view('rest_category.show', compact('rest_category'));
    }

    public function edit($id)
    {
        $rest_category = RestCategory::findOrFail($id);
        return view('rest_category.edit', compact('rest_category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $rest_category = RestCategory::findOrFail($id);

        $rest_category->name = $request->name;
        $rest_category->description = $request->description;
        $rest_category->save();

        return redirect()->route('rest_category.index')->with('success', 'rest_category updated successfully.');
    }

    public function destroy($id)
    {
        $rest_category = RestCategory::findOrFail($id);
        $rest_category->delete();

        return redirect()->route('rest_category.index')->with('success', 'rest_category deleted successfully.');
    }
}