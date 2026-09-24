// gestion users
// gérer profils
// niveau d'acces
// gestion produit, artistes, evenements (boutons, create edit delete)

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes boutiques</title>
    <link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
    @include('partials.header')
    <div class="container">
        <div class="topbar">
            <div>
                <div class="badge">Dashboard Admin</div>
                <!--<h1>Gérez</h1>-->
            </div>
            <a class="cta" href="{{ route('admin.view_create') }}">+ Ajouter une information</a><!--regarder la redirection, est-ce qu'on doit faire une autre page dédiée à admin ou on reprend les pages classiques pour créer-->
        </div>

        @if($admin->isEmpty())
            <div class="empty">
                Aucune donnée pour le moment.
            </div>
        @else
            <!--Partie Evenement-->
            <div class="grid">
                @foreach($evenements as $evenement)
                    <article class="card">
                        <span class="mini-tag">Evenements</span>
                        <h2>{{ $evenement->name }}</h2>
                        <p>{{ $evenement->description }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('evenement.show', $evenement->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('evenement.edit_view', $evenement->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('evenement.delete', $evenement->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Catalogue-->
            <div class="grid">
                @foreach($catalogues as $catalogue)
                    <article class="card">
                        <span class="mini-tag">Catalogues</span>
                        <h2>{{ $catalogue->name }}</h2>
                        <p>{{ $catalogue->description }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('catalogue.show', $catalogue->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('catalogue.edit_view', $catalogue->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('catalogue.delete', $catalogue->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Boutiques-->
            <div class="grid">
                @foreach($boutiques as $boutique)
                    <article class="card">
                        <span class="mini-tag">Boutiques</span>
                        <h2>{{ $boutique->name }}</h2>
                        <p>{{ $boutique->description }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('boutique.show', $boutique->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('boutique.edit_view', $boutique->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('boutique.delete', $boutique->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Produits-->
            <div class="grid">
                @foreach($produits as $produit)
                    <article class="card">
                        <span class="mini-tag">Produits</span>
                        <h2>{{ $produit->name }}</h2>
                        <p>{{ $produit->description }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('produit.show', $produit->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('produit.edit_view', $produit->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('produit.delete', $produit->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Users-->
            <div class="grid">
                @foreach($users as $user)
                    <article class="card">
                        <span class="mini-tag">Utilisateurs</span>
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->description }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('user.show', $user->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('user.edit_view', $user->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('user.delete', $user->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
