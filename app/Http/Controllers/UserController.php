<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Boutique;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('users.all', compact('users'));
    }

    public function create_view()
    {
        $boutiques = Boutique::all();
        return view('users.create', compact('boutiques'));
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
        return redirect()->route('admin');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'access_level' => ['required', 'in:user,artist,admin'],
            'boutique_id' => ['nullable', 'exists:boutiques,id'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "access_level" => $data['access_level'],
            "boutique_id" => $data['boutique_id'] ?? null,
            "password" => $data['password'],
        ]);
        return redirect()->route('admin');
    }

    public function edit_view($id)
    {
        $user = User::findOrFail($id);
        $boutiques = Boutique::all();
        return view('users.edit', compact('user', 'boutiques'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'access_level' => ['required', 'in:user,artist,admin'],
            'boutique_id' => ['nullable', 'exists:boutiques,id'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->access_level = $data['access_level'];
        $user->boutique_id = $data['boutique_id'] ?? null;
        if (! empty($data['password'])) {
            $user->password = $data['password'];
        }
        $user->save();
        return redirect()->route('admin');
    }
}
