<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestCategory;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurant.index', compact('restaurants'));
    }

    public function create()
    {
        return view('restaurant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'rest_category_id' => 'required|exists:rest_categories,id',
        ]);

        Restaurant::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'rest_category_id' => $request->rest_category_id,
        ]);

        return redirect()->route('restaurant.index')->with('success', 'Restaurants created successfully.');
    }

    public function show($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        return view('restaurant.show', compact('restaurants'));
    }

    public function edit($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        return view('restaurant.edit', compact('restaurants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'rest_category_id' => 'required|exists:rest_categories,id',
        ]);

        $restaurants = Restaurant::findOrFail($id);


        $restaurants->name = $request->name;
        $restaurants->address = $request->address;
        $restaurants->phone = $request->phone;
        $restaurants->email = $request->email;
        $restaurants->rest_category_id = $request->rest_category_id;
        $restaurants->save();

        return redirect()->route('restaurant.index')->with('success', 'restaurants updated successfully.');
    }

    public function destroy($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        $restaurants->delete();

        return redirect()->route('restaurant.index')->with('success', 'restaurants deleted successfully.');
    }
}
