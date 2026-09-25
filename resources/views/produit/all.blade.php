<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits de {{ $boutique->name }}</title>
</head>
<body>
    @include('partials.header')

    <main class="page product-list-page">
        <div class="product-list-header">
            <h1>Produits de {{ $boutique->name }}</h1>
        </div>

        @if($produits->isEmpty())
            <p class="empty">Aucun produit associé à cette boutique.</p>
        @else
            <div class="catalogue-products-grid">
                @foreach($produits as $produit)
                    <article class="card catalogue-product-card">
                        @if($produit->image_path)
                            <img
                                src="{{ asset($produit->image_path) }}"
                                alt="{{ $produit->name }}"
                                class="catalogue-product-image"
                            >
                        @endif
                        <h2>{{ $produit->name }}</h2>
                        <p class="catalogue-product-price">
                            {{ number_format((float) $produit->price, 2, ',', ' ') }} €
                        </p>
                        <a class="button primary" href="{{ route('produit.show', $produit->id) }}">Voir le produit</a>
                        <div class="actions-row">
                            <a class="button secondary" href="{{ route('produit.edit_view', $produit->id) }}">Modifier</a>
                            <a class="button danger" href="{{ route('produit.delete', $produit->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        <a class="button secondary" href="{{ route('profile') }}">Retour au profil</a>
    </main>
    @include('partials.footer')
</body>
</html>