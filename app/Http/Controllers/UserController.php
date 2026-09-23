<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('users.all', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.list'); //a voir avec admin
    }

    public function create(Request $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "access_level" => $request->access_level,
            "password" => $request->password
        ]);
        return redirect()->route('user.list');
    }

    public function edit_view($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->access_level = $request->access_level;
        $user->save();
        return redirect()->route('user.list');
    }
}
