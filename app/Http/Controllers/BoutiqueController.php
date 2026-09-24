<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boutique;

class BoutiqueController extends Controller
{
    public function list()
    {
        $boutiques = Boutique::all();
        return view('boutiques.all', compact('boutiques'));
    }

    public function show($id)
    {
        $boutique = Boutique::findOrFail($id);
        $catalogues = \App\Models\Catalogue::where('boutique_id', $id)->get();

        return view('boutiques.show', compact('boutique', 'catalogues'));
    }

    public function delete($id)
    {
        $boutique = Boutique::findOrFail($id);
        $boutique->delete();
        return redirect()->route('boutique.list'); //a voir avec admin
    }

    public function create(Request $request)
    {
        $boutique = Boutique::create([
            "name" => $request->name,
            "description" => $request->description,
            "contact_info" => $request->contact_info,
            "image_path" => $request->image_path
        ]);
        return redirect()->route('boutique.list');
    }

    public function edit_view($id)
    {
        $boutique = Boutique::findOrFail($id);
        return view('boutiques.edit', compact('boutique'));
    }

    public function edit(Request $request, $id)
    {
        $boutique = Boutique::findOrFail($id);
        $boutique->name = $request->name;
        $boutique->description = $request->description;
        $boutique->contact_info = $request->contact_info;
        $boutique->image_path = $request->image_path;
        $boutique->save();
        return redirect()->route('boutique.list');
    }
}
