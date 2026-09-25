<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Support\UploadedImage;

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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'lieu' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
            'lien_web' => ['nullable', 'url', 'max:255'],
        ]);

        $imagePath = $request->hasFile('image')
            ? UploadedImage::store($request->file('image'), 'evenement', $data['name'])
            : null;

        $evenement = Evenement::create([
            "name" => $data['name'],
            "description" => $data['description'] ?? null,
            "date" => $data['date'],
            "lieu" => $data['lieu'],
            "image_path" => $imagePath,
            "lien_web" => $data['lien_web'] ?? null
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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'lieu' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
            'lien_web' => ['nullable', 'url', 'max:255'],
        ]);

        $evenement->name = $data['name'];
        $evenement->description = $data['description'] ?? null;
        $evenement->date = $data['date'];
        $evenement->lieu = $data['lieu'];
        if ($request->hasFile('image')) {
            $evenement->image_path = UploadedImage::store($request->file('image'), 'evenement', $data['name']);
        }
        $evenement->lien_web = $data['lien_web'] ?? null;
        $evenement->save();
        return redirect()->route('evenement.list');
    }
}
