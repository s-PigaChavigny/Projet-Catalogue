<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;

class EvenementController extends Controller
{
    public function list()
    {
        $evenements = Evenement::all();
        return view('evenements.all', compact('evenements'));
    }

    public function show($id)
    {
        $evenement = Evenement::findOrFail($id);
        $catalogues = \App\Models\Catalogue::where('evenement_id', $id)->get();

        return view('evenements.show', compact('evenement', 'catalogues'));
    }

    public function delete($id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();
        return redirect()->route('evenement.list'); //a voir avec admin
    }

    public function create(Request $request)
    {
        $evenement = Evenement::create([
            "name" => $request->name,
            "description" => $request->description,
            "date" => $request->date,
            "lieu" => $request->lieu,
            "image_path" => $request->image_path,
            "lien_web" => $request->lien_web
        ]);
        return redirect()->route('evenement.list');
    }

    public function edit_view($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('evenements.edit', compact('evenement'));
    }

    public function edit(Request $request, $id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->name = $request->name;
        $evenement->description = $request->description;
        $evenement->date = $request->date;
        $evenement->lieu = $request->lieu;
        $evenement->image_path = $request->image_path;
        $evenement->lien_web = $request->lien_web;
        $evenement->save();
        return redirect()->route('evenement.list');
    }
}
