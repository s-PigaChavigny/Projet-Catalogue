<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit_Catalogue;

class Produit_CatalogueController extends Controller
{

    public function list($id)
    {
        $produit_catalogue = Produit_Catalogue::findOrFail($catalogue_id); //id du catalogue
        return view('produit_catalogues.show', compact('produit_catalogue'));
    }

    public function delete($id)
    {
        $produit_catalogue = Produit_Catalogue::findOrFail($id);
        $produit_catalogue->delete();
        return redirect()->route('produit_catalogue.list'); //a voir avec admin
    }

    public function create(Request $request)
    {
        $produit_catalogue = Produit_Catalogue::create([
            "produit_id" => $request->produit_id,
            "catalogue_id" => $request->catalogue_id
        ]);
        return redirect()->route('produit_catalogue.list');
    }
}