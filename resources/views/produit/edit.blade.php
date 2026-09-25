<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
</head>
<body>
    @include('partials.header')
    <div class="form-shell">
        <form method="POST" action="{{ route('produit.edit', $produit->id) }}" enctype="multipart/form-data">
            @csrf
            <h1 class="form-title">Modifier le produit</h1>

            <div class="field">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ $produit->name }}" required>
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $produit->description }}</textarea>
            </div>

            <div class="field">
                <label for="boutique_id">Boutique</label>
                @if(auth()->user()->access_level === 'artist')
                    <p>{{ $produit->boutique?->name ?? 'Boutique associée' }}</p>
                    <input type="hidden" name="boutique_id" value="{{ $produit->boutique_id }}">
                @else
                    <select id="boutique_id" name="boutique_id" required>
                        @foreach($boutiques as $boutique)
                            <option value="{{ $boutique->id }}" @selected($produit->boutique_id == $boutique->id)>{{ $boutique->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="field">
                <label for="image">Image</label>
                <input id="image" type="file" name="image" accept="image/*">
            </div>

            <div class="field">
                <label for="price">Prix</label>
                <input id="price" type="number" name="price" value="{{ $produit->price }}">
            </div>

            <div class="actions-row">
                <button type="submit" class="button success">Mettre à jour</button>
                <a class="back" href="{{ route('boutique.produits', $produit->boutique_id) }}">Retour aux produits</a>
            </div>
        </form>
    </div>
    @include('partials.footer')
</body>
</html>
