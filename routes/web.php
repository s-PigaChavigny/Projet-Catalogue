<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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
    return view('acceuil', [
        'evenements' => Schema::hasTable('evenements')
            ? Evenement::orderByDesc('date')->take(2)->get()
            : collect(),
        'boutiques' => Schema::hasTable('boutiques')
            ? Boutique::take(3)->get()
            : collect(),
    ]);
})->name('home');

Route::get('/accueil', function () {
    return view('acceuil', [
        'evenements' => Schema::hasTable('evenements')
            ? Evenement::orderByDesc('date')->take(2)->get()
            : collect(),
        'boutiques' => Schema::hasTable('boutiques')
            ? Boutique::take(3)->get()
            : collect(),
    ]);
})->name('acceuil');


Route::get('/search', function () {
    $requests = Evenement::query()->get();
    $requests = Boutique::query()->get();
    return view('search', compact('requests'));
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
        $user = Auth::user();
        $boutique = $user->boutique_id ? Boutique::find($user->boutique_id) : null;
        $catalogues = $boutique
            ? Catalogue::where('boutique_id', $boutique->id)->get()
            : collect();

        return view('auth.profile', compact('user', 'boutique', 'catalogues'));
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
    Route::get("/{id}/produits", [ProduitController::class, 'listByBoutique'])
        ->where('id', '[0-9]+')
        ->name("produits");
    Route::get("/{id}", [BoutiqueController::class, 'show'])->where('id', '[0-9]+')->name("show");

    // Créer une boutique
    Route::get('/create', function () {
        return view('boutiques.create');
    })->middleware('admin')->name("view_create");
    Route::post('/create', [BoutiqueController::class, 'create'])->middleware('admin')->name("create");

    // Modifier une boutique
    Route::get("/{id}/edit", [BoutiqueController::class, 'edit_view'])->middleware('admin')->name("edit_view");
    Route::post("/{id}/edit", [BoutiqueController::class, 'edit'])->middleware('admin')->name("edit");

    // Supprimer une boutique
    Route::get("/{id}/delete", [BoutiqueController::class, 'delete'])->middleware('admin')->name("delete");
});

Route::prefix('evenement')->name("evenement.")->group(function () {
    Route::get('/', [EvenementController::class, 'list'])->name("list");
    Route::get('/{id}', [EvenementController::class, 'show'])->where('id', '[0-9]+')->name("show");

    Route::get('/create', function () {
        return view('evenements.create');
    })->middleware('admin')->name("view_create");
    Route::post('/create', [EvenementController::class, 'create'])->middleware('admin')->name("create");

    Route::get('/{id}/edit', [EvenementController::class, 'edit_view'])->middleware('admin')->name("edit_view");
    Route::post('/{id}/edit', [EvenementController::class, 'edit'])->middleware('admin')->name("edit");

    Route::get('/{id}/delete', [EvenementController::class, 'delete'])->middleware('admin')->name("delete");
});

Route::prefix('catalogue')->name("catalogue.")->group(function () {
    Route::get('/create', [CatalogueController::class, 'create_view'])->middleware('catalogue.access')->name("view_create");
    Route::post('/create', [CatalogueController::class, 'create'])->middleware('catalogue.access')->name("create");

    Route::get('/{id}', [CatalogueController::class, 'show'])->where('id', '[0-9]+')->name("show");

    Route::get('/{id}/edit', [CatalogueController::class, 'edit_view'])->middleware('catalogue.access')->name("edit_view");
    Route::post('/{id}/edit', [CatalogueController::class, 'edit'])->middleware('catalogue.access')->name("edit");

    Route::post('/{id}/add-product', [CatalogueController::class, 'addProduct'])->middleware('catalogue.access')->name("add_product");
    Route::post('/{id}/remove-product', [CatalogueController::class, 'removeProduct'])->middleware('catalogue.access')->name("remove_product");

    Route::get('/{id}/delete', [CatalogueController::class, 'delete'])->middleware('catalogue.access')->name("delete");
});

Route::prefix('produit')->name("produit.")->group(function () {

    Route::get('/{id}', [ProduitController::class, 'show'])->where('id', '[0-9]+')->name("show");

    Route::get('/create', function () {
        return app(ProduitController::class)->create_view();
    })->middleware('product.access')->name("view_create");
    Route::post('/create', [ProduitController::class, 'create'])->middleware('product.access')->name("create");

    Route::get('/{id}/edit', [ProduitController::class, 'edit_view'])->middleware('product.access')->name("edit_view");
    Route::post('/{id}/edit', [ProduitController::class, 'edit'])->middleware('product.access')->name("edit");

    Route::get('/{id}/delete', [ProduitController::class, 'delete'])->middleware('product.access')->name("delete");
});

Route::prefix('user')->name('user.')->middleware('admin')->group(function () {
    Route::get('/', [UserController::class, 'list'])->name('list');
    Route::get('/create', [UserController::class, 'create_view'])->name('create');
    Route::post('/create', [UserController::class, 'create'])->name('store');
    Route::get('/{id}', [UserController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [UserController::class, 'edit_view'])->name('edit_view');
    Route::post('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::get('/{id}/delete', [UserController::class, 'delete'])->name('delete');
});

Route::get('/admin', function () {
    return view('admin', [
        'evenements' => Evenement::all(),
        'catalogues' => Catalogue::all(),
        'boutiques' => Boutique::all(),
        'produits' => Produit::all(),
        'users' => User::all(),
    ]);
})->middleware(['auth', 'admin'])->name('admin');

