<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
</head>
<body>
    @include('partials.header')

    <div>
        <h1>Mon profil</h1>

        <div>
            <div>
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
            </div>
        </div>

        <div>
            @if($user->access_level === 'artist' && $boutique)
                <a href="{{ route('boutique.show', $boutique->id) }}" class="button secondary">Ma boutique</a>
                <a href="{{ route('boutique.produits', $boutique->id) }}" class="button secondary">Mes produits</a>
                <a href="{{ route('catalogue.view_create', ['boutique_id' => $boutique->id]) }}" class="button primary">Créer un catalogue</a>
                <a href="{{ route('produit.view_create', ['boutique_id' => $boutique->id]) }}" class="button primary">Ajouter un produit</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button danger">Se déconnecter</button>
            </form>
        </div>

        @if($user->access_level === 'artist' && $boutique)
            <h2>Catalogues de ma boutique</h2>
            @if($catalogues->isEmpty())
                <p>Aucun catalogue associé à votre boutique.</p>
            @else
                <ul>
                    @foreach($catalogues as $catalogue)
                        <li>
                            <a href="{{ route('catalogue.show', $catalogue->id) }}">
                                {{ $catalogue->evenement?->name ?? 'Événement non associé' }}
                            </a>
                            <a href="{{ route('catalogue.edit_view', $catalogue->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('catalogue.delete', $catalogue->id) }}" class="button danger">Supprimer</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    </div>
    @include('partials.footer')
</body>
</html>
