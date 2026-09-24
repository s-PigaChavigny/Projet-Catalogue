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
                        <a href="{{ route('produit.show', $produit->id) }}">{{ $produit->name }}</a>
                        <span>{{ $produit->price }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('boutique.show', $boutique->id) }}">Retour à la boutique</a>
    </main>
</body>
</html>