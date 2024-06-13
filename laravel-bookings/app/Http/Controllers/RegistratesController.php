<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registion;

class RegistratesController extends Controller
{
    public function index()
    {
        $all_register = Registion::all();
        return view('registrate.index', compact('all_register'));
    }
    public function create()
    {
        return view('register.create');
    }
    public function edit(Registion $registion)
    {
        return view('registrate.edit', compact('registion'));
    }
    public function destroy(Registion $registion)
    {
        $registion->delete();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'year'=>'required',
            'experience'=>'required',
            'direction_id'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        Registion::create($request->all());
        return redirect()->route('registrate.create')->with('message','User added');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'year'=>'required',
            'experience'=>'required',
            'direction'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $registion = Registion::find($id);
        $registion->update($request->all());
        return view('registrate.create', compact('registion'));
    }
}
