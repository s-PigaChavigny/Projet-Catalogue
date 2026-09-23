<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;

class CatalogueController extends Controller
{
    public function list()
    {
        $catalogues = Catalogue::all();
        return view('catalogues.all', compact('catalogues'));
    }

    public function show($id)
    {
        $catalogue = Catalogue::findOrFail($id);
        return view('catalogues.show', compact('catalogue'));
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