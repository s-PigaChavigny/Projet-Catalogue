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
        $catalogue->delete();
        return redirect()->route('catalogue.list'); //a voir avec admin
    }

    public function create(Request $request)
    {
        $catalogue = Catalogue::create([
            "boutique_id" => $request->boutique_id,
            "evenement_id" => $request->evenement_id
        ]);
        return redirect()->route('catalogue.list');
    }
}