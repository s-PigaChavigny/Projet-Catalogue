<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    @include('partials.header')
    <div>
        <div>
            <div>
                <div>Dashboard Admin</div>
                <!--<h1>Gérez</h1>-->
            </div>
            
        </div>

            <!--Partie Evenement-->
            <div>
                <h1>Événements</h1>
                <a href="{{ route('evenement.create') }}" class="button primary">Ajouter</a>
                @foreach($evenements as $evenement)
                    <article>
                        <h2>{{ $evenement->name }}</h2>
                        <p>{{ $evenement->date }}</p>
                        <p>{{ $evenement->lieu }}</p>

                        <div class="actions">
                            <a href="{{ route('evenement.show', $evenement->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('evenement.edit_view', $evenement->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('evenement.delete', $evenement->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Boutique-->
            <div>
                <h1>Boutiques</h1>
                <a href="{{ route('boutique.create') }}" class="button primary">Ajouter</a>
                @foreach($boutiques as $boutique)
                    <article>
                        <h2>{{ $boutique->name }}</h2>
                        <p>{{ $boutique->contact_info }}</p>

                        <div>
                            <a href="{{ route('boutique.show', $boutique->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('boutique.edit_view', $boutique->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('boutique.delete', $boutique->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Catalogue-->
            <div>
                <h1>Catalogues</h1>
                <a href="{{ route('catalogue.create') }}" class="button primary">Ajouter</a>
                @foreach($catalogues as $catalogue)
                    <article>
                        <h2>{{ $boutique->name }}</h2>
                        <p>{{ $evenement->name }}</p>

                        <div>
                            <a href="{{ route('catalogue.show', $catalogue->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('catalogue.edit_view', $catalogue->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('catalogue.delete', $catalogue->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Produits-->
            <div>
                <h1>Produits</h1>
                <a href="{{ route('produit.create') }}" class="button primary">Ajouter</a>
                @foreach($produits as $produit)
                    <article>
                        <h2>{{ $produit->name }}</h2>

                        <div>
                            <a href="{{ route('produit.show', $produit->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('produit.edit_view', $produit->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('produit.delete', $produit->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <!--Partie Users-->
            <div>
                <h1>Utilisateurs</h1>
                <a href="{{ route('user.create') }}" class="button primary">Ajouter</a>
                @foreach($users as $user)
                    <article>
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->access_level }}</p>

                        <div>
                            <a href="{{ route('user.show', $user->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('user.edit_view', $user->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('user.delete', $user->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
    </div>
    @include('partials.footer')
</body>
</html>
