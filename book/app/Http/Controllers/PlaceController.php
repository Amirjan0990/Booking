<?php
namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('places.index', compact('places'));
    }

    public function create()
    {
        return view('places.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'number' => 'required|string',
            'description' => 'nullable|string',
            'capacity' => 'required|integer',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        Place::create($request->all());

        return redirect('/places')->with('success', 'Place created successfully');
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);
        return view('places.show', compact('place'));
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);
        return view('places.edit', compact('place'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'number' => 'required|string',
            'description' => 'nullable|string',
            'capacity' => 'required|integer',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $place = Place::findOrFail($id);
        $place->update($request->all());

        return redirect('/places')->with('success', 'Place updated successfully');
    }

    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        $place->delete();

        return redirect('/places')->with('success', 'Place deleted successfully');
    }
}
