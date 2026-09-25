<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boutique;
use App\Support\UploadedImage;

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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'contact_info' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        $imagePath = $request->hasFile('image')
            ? UploadedImage::store($request->file('image'), 'boutique', $data['name'])
            : null;

        $boutique = Boutique::create([
            "name" => $data['name'],
            "description" => $data['description'] ?? null,
            "contact_info" => $data['contact_info'] ?? null,
            "image_path" => $imagePath
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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'contact_info' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        $boutique->name = $data['name'];
        $boutique->description = $data['description'] ?? null;
        $boutique->contact_info = $data['contact_info'] ?? null;
        if ($request->hasFile('image')) {
            $boutique->image_path = UploadedImage::store($request->file('image'), 'boutique', $data['name']);
        }
        $boutique->save();
        return redirect()->route('boutique.list');
    }
}
