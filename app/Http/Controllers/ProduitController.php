<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function list()
    {
        $produits = Produit::findOrFail($boutique_id);
        return view('produits.all', compact('produits'));
    }

    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.show', compact('produit'));
    }

    public function delete($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->route('produit.list'); //a voir avec admin
    }

    public function create(Request $request)
    {
        $produit = Produit::create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image_path" => $request->image_path
        ]);
        return redirect()->route('produit.list');
    }

    public function edit_view($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.edit', compact('produit'));
    }

    public function edit(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->price = $request->price;
        $produit->image_path = $request->image_path;
        $produit->save();
        return redirect()->route('produit.list');
    }
}
