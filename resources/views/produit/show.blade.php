<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produit->name }}</title>
</head>
<body>
    @include('partials.header')
    <div>
        <div>
            <div>
                <h1>{{ $produit->name }}</h1>
            </div>

            <div>
                <p>{{ $produit->description }}</p>

                @if($produit->image_path)
                    <img src="{{ asset($produit->image_path) }}" alt="{{ $produit->name }}">
                @endif
                
                <div>
                    Prix : {{ $produit->price }}
                </div>

                <a href="{{ route('boutique.show', $produit->boutique_id) }}">← Retour à la boutique</a>
            </div>
        </div>
    </div>
    @include('partials.footer')
</body>
</html>
