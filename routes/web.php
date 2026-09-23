<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    return view('acceuil');
})->name('home');

Route::get('/accueil', function () {
    return view('acceuil');
})->name('acceuil');

Route::get('/search', function (Request $request) {
    return view('welcome', ['q' => $request->q]);
})->name('search');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->with('error', 'Le mot de passe ou l’email est incorrect.');
        }

        $request->session()->regenerate();

        return redirect()->intended('/profile');
    });

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', function (Request $request) {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'access_level' => 'user',
        ]);

        Auth::login($user);

        return redirect('/profile');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('auth.profile', ['user' => Auth::user()]);
    })->name('profile');

    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    })->name('logout');
});

Route::prefix('boutique')->name("boutique.")->group(function () {
    // Afficher boutiques
    Route::get('/', [BoutiqueController::class, 'list'])->name("list");
    Route::get("/{id}", [BoutiqueController::class, 'show'])->where('id', '[0-9]+')->name("show");

    // Créer une boutique
    Route::get('/create', function () {
        return view('boutiques.create');
    })->name("view_create");
    Route::post('/create', [BoutiqueController::class, 'create'])->name("create");

    // Modifier une boutique
    Route::get("/{id}/edit", [BoutiqueController::class, 'edit_view'])->name("edit_view");
    Route::post("/{id}/edit", [BoutiqueController::class, 'edit'])->name("edit");

    // Supprimer une boutique
    Route::get("/{id}/delete", [BoutiqueController::class, 'delete'])->name("delete");
});

Route::prefix('evenement')->name("evenement.")->group(function () {
    Route::get('/', [EvenementController::class, 'list'])->name("list");
    Route::get('/{id}', [EvenementController::class, 'show'])->where('id', '[0-9]+')->name("show");

    Route::get('/create', function () {
        return view('evenements.create');
    })->name("view_create");
    Route::post('/create', [EvenementController::class, 'create'])->name("create");

    Route::get('/{id}/edit', [EvenementController::class, 'edit_view'])->name("edit_view");
    Route::post('/{id}/edit', [EvenementController::class, 'edit'])->name("edit");

    Route::get('/{id}/delete', [EvenementController::class, 'delete'])->name("delete");
});