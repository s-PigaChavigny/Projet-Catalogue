<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produit->name }}</title>
</head>
<body>
    @include('partials.header')
    <div class="page">
        <article class="product-detail-card">
            <div class="product-detail-media">
                @if($produit->image_path)
                    <img src="{{ asset($produit->image_path) }}" alt="{{ $produit->name }}">
                @else
                    <div class="product-detail-placeholder">Aucune image disponible</div>
                @endif
            </div>

            <div class="product-detail-content">
                <span class="home-card-tag">Produit</span>
                <h1>{{ $produit->name }}</h1>
                <p class="product-detail-price">
                    {{ number_format((float) $produit->price, 2, ',', ' ') }} €
                </p>
                <p class="product-detail-description">{{ $produit->description }}</p>
                <a class="button secondary" href="{{ route('boutique.show', $produit->boutique_id) }}">← Retour à la boutique</a>
            </div>
        </article>
    </div>
    @include('partials.footer')
</body>
</html>
