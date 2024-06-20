<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    public function index()
    {
        $foods = Food::all();
        return view('food.index', compact('foods'));
    }

    public function create()
    {
        return view('food.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'food_category_id' => 'required|exists:food_categories,id',
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'time' => 'required',
            'is_active' => 'required',
        ]);
        Food::create([
            'food_category_id' => $request->food_category_id,
            'restaurant_id' => $request->restaurant_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'description' => $request->description,
            'time' => $request->time,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('food.index')->with('success', 'Foods created successfully.');
    }

    public function show($id)
    {
        $foods = Food::findOrFail($id);
        return view('food.edit', compact('foods'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'food_category_id' => 'required|exists:food_categories,id',
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'time' => 'required',
            'is_active' => 'required',
        ]);
        $foods = Food::findOrFail($id);

        $foods->food_category_id = $request->food_category_id;
        $foods->restaurant_id = $request->restaurant_id;
        $foods->name = $request->name;
        $foods->price = $request->price;
        $foods->image = $request->image;
        $foods->description = $request->description;
        $foods->time = $request->time;
        $foods->is_active = $request->is_active;
        $foods->save();

        return redirect()->route('food.index')->with('success', 'foods updated successfully.');
    }

    public function destroy($id)
    {
        $foods = Food::findOrFile($id);
        $foods->delete();

        return redirect()->route('food.index')->with('success', 'foods deleted successfully.');
    }
}