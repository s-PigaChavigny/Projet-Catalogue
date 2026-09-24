<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $catalogue->name }}</title>
</head>
<body>

    <div class="page">
        <div class="detail-card">
            <div class="hero">
                <h1>{{ $catalogue->name }}</h1>
            </div>

            <div class="content">
                <p>Voici les produits présents dans ce catalogue.</p>

                @if($produits->isNotEmpty())
                    <ul>
                        @foreach($produits as $produit)
                            <li>
                                <a href="{{ route('produit.show', $produit->id) }}">{{ $produit->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucun produit associé à ce catalogue pour le moment.</p>
                @endif
            </div>
        </div>

        <a class="back" href="{{ route('boutique.list') }}">← Retour aux boutiques</a>
    </div>
</body>
</html>