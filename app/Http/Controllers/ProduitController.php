<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Boutique;
use App\Support\UploadedImage;

class ProduitController extends Controller
{
    public function create_view()
    {
        $boutiques = auth()->user()->access_level === 'artist'
            ? Boutique::whereKey(auth()->user()->boutique_id)->get()
            : Boutique::all();

        return view('produit.create', compact('boutiques'));
    }

    public function listByBoutique($boutiqueId)
    {
        $boutique = Boutique::findOrFail($boutiqueId);
        $produits = Produit::where('boutique_id', $boutique->id)->get();

        return view('produit.all', compact('boutique', 'produits'));
    }

    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produit.show', compact('produit'));
    }

    public function delete($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->back();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'boutique_id' => ['required', 'exists:boutiques,id'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        $imagePath = $request->hasFile('image')
            ? UploadedImage::store($request->file('image'), 'produit', $data['name'])
            : null;

        $produit = Produit::create([
            "name" => $data['name'],
            "description" => $data['description'] ?? null,
            "price" => $data['price'],
            "boutique_id" => $data['boutique_id'],
            "image_path" => $imagePath
        ]);
        return redirect()->route('boutique.produits', $produit->boutique_id);
    }

    public function edit_view($id)
    {
        $produit = Produit::findOrFail($id);
        $boutiques = Boutique::all();
        return view('produit.edit', compact('produit', 'boutiques'));
    }

    public function edit(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'boutique_id' => ['required', 'exists:boutiques,id'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        $produit->name = $data['name'];
        $produit->description = $data['description'] ?? null;
        $produit->price = $data['price'];
        $produit->boutique_id = $data['boutique_id'];
        if ($request->hasFile('image')) {
            $produit->image_path = UploadedImage::store($request->file('image'), 'produit', $data['name']);
        }
        $produit->save();
        return redirect()->route('boutique.produits', $produit->boutique_id);
    }
}
