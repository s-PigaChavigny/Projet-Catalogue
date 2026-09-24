<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){ //recherche dans les evenements
        $request = Evenement::query()->whereHas('search', function ($request) use ($search) {
        $search_escaped = str_replace('%', '\%', $search);
        $request->where('q', 'LIKE', '%' . $search_escaped . '%');
        });
    }

    /*public function searchBoutique(){
        $queryBoutique = Boutique::query()->whereHas('search', function ($queryBoutique) use ($search) {
        $search_escaped = str_replace('%', '\%', $search);
        $queryBoutique->where('name', 'LIKE', '%' . $search_escaped . '%')->orWhere('description', 'LIKE', '%' . $search_escaped . '%');
        });
    }*/

}
