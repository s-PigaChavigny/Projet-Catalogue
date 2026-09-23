<?php

use Illuminate\Support\Facades\Route;

use App\Models\Boutique;
use App\Http\Controllers\BoutiqueController;

use App\Models\Catalogue;
use App\Http\Controllers\CatalogueController;

use App\Models\Evenement;
use App\Http\Controllers\EvenementController;

use App\Models\Favori;
use App\Http\Controllers\FavoriController;

use App\Http\Controllers\LoginController;

use App\Models\Produit_Catalogue;
use App\Http\Controllers\Produit_CatalogueController;

use App\Models\Produit;
use App\Http\Controllers\ProduitController;

use App\Models\User;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
