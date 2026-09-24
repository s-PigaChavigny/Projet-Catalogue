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
        <div class="detail-card">
            <div class="hero">
                <h1>{{ $produit->name }}</h1>
            </div>

            <div class="content">
                <p>{{ $produit->description }}</p>

                @if($produit->image_path)
                    <img class="image" src="{{ $produit->image_path }}" alt="{{ $produit->name }}">
                @endif
                
                <div class="meta">
                    Prix : {{ $produit->price }}
                </div>

                <a class="back" href="{{ route('catalogue.list') }}">← Retour au catalogue</a>
            </div>
        </div>
    </div>
</body>
</html>
