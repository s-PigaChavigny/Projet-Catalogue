<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits de {{ $boutique->name }}</title>
</head>
<body>
    @include('partials.header')

    <main>
        <h1>Produits de {{ $boutique->name }}</h1>

        @if($produits->isEmpty())
            <p>Aucun produit associé à cette boutique.</p>
        @else
            <ul>
                @foreach($produits as $produit)
                    <li>
                        <a class="button primary" href="{{ route('produit.show', $produit->id) }}">{{ $produit->name }}</a>
                        <span>{{ $produit->price }}</span>
                        <a class="button secondary" href="{{ route('produit.edit_view', $produit->id) }}">Modifier</a>
                        <a class="button danger" href="{{ route('produit.delete', $produit->id) }}">Supprimer</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <a class="button secondary" href="{{ route('profile') }}">Retour au profil</a>
    </main>
    @include('partials.footer')
</body>
</html>