<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $catalogue->name }}</title>
</head>
<body>
    @include('partials.header')

    <div class="page">
        <div class="detail-card">
            <div class="hero">
                <p class="catalogue-boutique">Boutique : {{ $boutique->name }}</p>
                <h1>{{ $catalogue->name }}</h1>
            </div>

            <div class="content">
                @if($produits->isNotEmpty())
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
                            </article>
                        @endforeach
                    </div>
                @else
                    <p>Aucun produit associé à ce catalogue pour le moment.</p>
                @endif
            </div>
        </div>

        <a class="button secondary" href="{{ route('boutique.show', $catalogue->boutique_id) }}">← Retour à la boutique</a>
        <a class="button secondary" href="{{ route('evenement.show', $catalogue->evenement_id) }}">← Retour à l'événement</a>
    </div>
    @include('partials.footer')
</body>
</html>