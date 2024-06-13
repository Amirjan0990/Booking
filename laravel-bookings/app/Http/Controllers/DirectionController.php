<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    public function index()
    {
        $all_direction = Direction::all();
        return view('index', compact('all_direction'));
    }
    public function create()
    {
        return view('direction.create');
    }
    public function edit(Direction $direction)
    {
        return view('direction.edit', compact('direction'));
    }
    public function destroy(Direction $direction)
    {
        $direction->delete();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Direction::create($request->all());
        return redirect()->route('direction.create')->with('message','success');
    }
}
