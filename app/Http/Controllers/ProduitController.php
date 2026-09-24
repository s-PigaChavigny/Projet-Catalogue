<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Support\UploadedImage;

class ProduitController extends Controller
{
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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        $imagePath = $request->hasFile('image')
            ? UploadedImage::store($request->file('image'), 'produit', $data['name'])
            : null;

        $produit = Produit::create([
            "name" => $data['name'],
            "description" => $data['description'] ?? null,
            "price" => $data['price'],
            "image_path" => $imagePath
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
