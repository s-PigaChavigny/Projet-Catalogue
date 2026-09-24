<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    @include('partials.header')
    <div class="container">
        <div class="topbar">
            <div>
                <div class="badge">Dashboard Admin</div>
                <!--<h1>Gérez</h1>-->
            </div>
            
        </div>

            <!--Partie Evenement-->
            <div class="grid">
                <h1>Événements</h1>
                <a class="link primary" href="{{ route('evenement.create') }}">Ajouter</a>
                @foreach($evenements as $evenement)
                    <article class="card">
                        <h2>{{ $evenement->name }}</h2>
                        <p>{{ $evenement->description }}</p>
                        <p>{{ $evenement->date }}</p>
                        <p>{{ $evenement->lieu }}</p>
                        <p>{{ $evenement->image_path }}</p>
                        <p>{{ $evenement->lien_web }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('evenement.show', $evenement->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('evenement.edit_view', $evenement->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('evenement.delete', $evenement->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Boutique-->
            <div class="grid">
                <h1>Boutiques</h1>
                <a class="link primary" href="{{ route('boutique.create') }}">Ajouter</a>
                @foreach($boutiques as $boutique)
                    <article class="card">
                        <h2>{{ $boutique->name }}</h2>
                        <p>{{ $boutique->description }}</p>
                        <p>{{ $boutique->contact_info }}</p>
                        <p>{{ $boutique->image_path }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('boutique.show', $boutique->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('boutique.edit_view', $boutique->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('boutique.delete', $boutique->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Catalogue-->
            <div class="grid">
                <h1>Catalogues</h1>
                <a class="link primary" href="{{ route('catalogue.create') }}">Ajouter</a>
                @foreach($catalogues as $catalogue)
                    <article class="card">
                        <h2>{{ $boutique->name }}</h2>
                        <p>{{ $evenement->name }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('catalogue.show', $catalogue->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('catalogue.edit_view', $catalogue->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('catalogue.delete', $catalogue->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Produits-->
            <div class="grid">
                <h1>Produits</h1>
                <a class="link primary" href="{{ route('produit.create') }}">Ajouter</a>
                @foreach($produits as $produit)
                    <article class="card">
                        <h2>{{ $produit->name }}</h2>
                        <p>{{ $produit->description }}</p>
                        <p>{{ $produit->price }}</p>
                        <p>{{ $produit->image_path }}</p>

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
                <h1>Utilisateurs</h1>
                <a class="link primary" href="{{ route('register') }}">Ajouter</a>
                @foreach($users as $user)
                    <article class="card">
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->access_level }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('user.show', $user->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('user.edit_view', $user->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('user.delete', $user->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
    </div>
</body>
</html>
