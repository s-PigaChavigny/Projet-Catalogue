<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchEvenement(){
        $queryEvenement = Evenement::query()->whereHas('search.show', function ($queryEvenement) use ($search) {
        $search_escaped = str_replace('%', '\%', $search);
        $queryEvenement->where('name', 'LIKE', '%' . $search_escaped . '%')->orWhere('description', 'LIKE', '%' . $search_escaped . '%');
        });
    }

    public function searchBoutique(){
        $queryBoutique = Boutique::query()->whereHas('search.show', function ($queryBoutique) use ($search) {
        $search_escaped = str_replace('%', '\%', $search);
        $queryBoutique->where('name', 'LIKE', '%' . $search_escaped . '%')->orWhere('description', 'LIKE', '%' . $search_escaped . '%');
        });
    }

    public function searchUser(){
        $queryUser = User::query()->whereHas('search.show', function ($queryUser) use ($search) {
        $search_escaped = str_replace('%', '\%', $search);
        $queryUser->where('name', 'LIKE', '%' . $search_escaped . '%')->orWhere('description', 'LIKE', '%' . $search_escaped . '%');
        });
    }

    public function searchProduit(){
        $queryProduit = Produit::query()->whereHas('search.show', function ($queryProduit) use ($search) {
        $search_escaped = str_replace('%', '\%', $search);
        $queryProduit->where('name', 'LIKE', '%' . $search_escaped . '%')->orWhere('description', 'LIKE', '%' . $search_escaped . '%');
        });
    }
}
