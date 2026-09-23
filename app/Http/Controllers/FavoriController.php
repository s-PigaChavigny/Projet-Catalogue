<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favori;

class FavoriController extends Controller
{
    public function list()
    {
        $favoris = Favori::all();
        return view('favoris.all', compact('favoris'));
    }

    public function delete($id)
    {
        $favori = Favori::findOrFail($id);
        $favori->delete();
        return redirect()->route('favori.list'); //a voir avec admin
    }

    public function create(Request $request)
    {
        $favori = Favori::create([
            "user_id" => $request->user_id,
            "produit_id" => $request->produit_id
        ]);
        return redirect()->route('favori.list');
    }
}