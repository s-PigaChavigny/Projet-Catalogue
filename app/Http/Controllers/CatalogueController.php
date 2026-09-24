<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;
use App\Models\Produit;
use App\Models\Produit_Catalogue;

class CatalogueController extends Controller
{
    public function show($id)
    {
        $catalogue = Catalogue::findOrFail($id);

        $produitIds = Produit_Catalogue::where('catalogue_id', $catalogue->id)
            ->pluck('produit_id');

        $produits = Produit::whereIn('id', $produitIds)->get();

        return view('catalogue.show', compact('catalogue', 'produits'));
    }

    public function delete($id)
    {
        $catalogue = Catalogue::findOrFail($id);
        $boutiqueId = $catalogue->boutique_id;
        $catalogue->delete();
        return redirect()->route('boutique.show', $boutiqueId);
    }

    public function create_view(Request $request)
    {
        $boutiqueId = (int) $request->query('boutique_id', 0);

        $availableProduits = $boutiqueId > 0
            ? Produit::where('boutique_id', $boutiqueId)->get()
            : collect();

        $catalogueProduits = collect();

        return view('catalogue.create', compact('availableProduits', 'catalogueProduits', 'boutiqueId'));
    }

    public function create(Request $request)
    {
        $catalogue = Catalogue::create([
            "boutique_id" => $request->boutique_id,
            "evenement_id" => $request->evenement_id
        ]);

        return redirect()->route('catalogue.edit_view', $catalogue->id);
    }

    public function edit_view($id)
    {
        $catalogue = Catalogue::findOrFail($id);

        $produitIds = Produit_Catalogue::where('catalogue_id', $catalogue->id)
            ->pluck('produit_id');

        $catalogueProduits = Produit::whereIn('id', $produitIds)->get();
        $availableProduits = Produit::where('boutique_id', $catalogue->boutique_id)
            ->whereNotIn('id', $produitIds)
            ->get();

        return view('catalogue.edit', compact('catalogue', 'catalogueProduits', 'availableProduits'));
    }

    public function edit(Request $request, $id)
    {
        $catalogue = Catalogue::findOrFail($id);
        $catalogue->boutique_id = $request->boutique_id;
        $catalogue->evenement_id = $request->evenement_id;
        $catalogue->save();

        return redirect()->route('catalogue.show', $catalogue->id);
    }

    public function addProduct(Request $request, $catalogueId)
    {
        $request->validate([
            'produit_id' => ['required', 'integer'],
        ]);

        $catalogue = Catalogue::findOrFail($catalogueId);
        $produit = Produit::findOrFail($request->produit_id);

        if ($produit->boutique_id != $catalogue->boutique_id) {
            abort(422, 'Ce produit n’appartient pas à cette boutique.');
        }

        Produit_Catalogue::firstOrCreate([
            'catalogue_id' => $catalogue->id,
            'produit_id' => $produit->id,
        ]);

        return back();
    }

    public function removeProduct(Request $request, $catalogueId)
    {
        $request->validate([
            'produit_id' => ['required', 'integer'],
        ]);

        Produit_Catalogue::where('catalogue_id', $catalogueId)
            ->where('produit_id', $request->produit_id)
            ->delete();

        return back();
    }
}