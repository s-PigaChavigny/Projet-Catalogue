<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){ //recherche dans les produit
        $request = Evenement::query()->whereHas('search', function ($request) use ($search) {
        $search_escaped = str_replace('%', '\%', $search);
        $request->where('q', 'LIKE', '%' . $search_escaped . '%');
        });
    }

    public function searchBoutique(){
        $request = Boutique::query()->whereHas('search', function ($request) use ($search) {
        $search_escaped = str_replace('%', '\%', $search);
        $request->where('q', 'LIKE', '%' . $search_escaped . '%');
        });
    }

}
