<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
    public function edit(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function show(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|string',
        ]);

        User::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
    }
}
