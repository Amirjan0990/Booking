<?php
namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
public function index()
{
$foodcategory = FoodCategory::all();
return view('foodcategories.index', compact('foodcategory'));
}

public function create()
{
return view('foodcategories.create');
}

public function store(Request $request)
{
$request->validate([
'name' => 'required|string',
'description' => 'required|string',
]);

FoodCategory::create($request->all());

return redirect('/foodcategories')->with('success', 'FoodCategories created successfully');
}

public function show($id)
{
$foodcategory = FoodCategory::findOrFail($id);
return view('foodcategories.show', compact('foodcategory'));
}

public function edit($id)
{
$foodcategory = FoodCategory::findOrFail($id);
return view('foodcategories.edit', compact('foodcategory'));
}

public function update(Request $request, $id)
{
$request->validate([
'name' => 'required|string',
'description' => 'required|string',
]);

    $foodcategory = FoodCategory::findOrFail($id);
    $foodcategory->update($request->all());

return redirect('/foodcategories')->with('success', 'FoodCategory updated successfully');
}

public function destroy($id)
{
    $foodcategory = FoodCategory::findOrFail($id);
    $foodcategory->delete();

return redirect('/foodcategories')->with('success', 'FoodCategory deleted successfully');
}
}
