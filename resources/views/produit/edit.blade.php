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
        <form method="POST" action="{{ route('produit.edit', $produit->id) }}">
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
                <label for="image_path">Image</label>
                <input id="image_path" type="file" name="image_path" value="{{ $produit->image_path }}">
            </div>

            <div class="field">
                <label for="price">Prix</label>
                <input id="price" type="number" name="price" value="{{ $produit->price }}">
            </div>

            <div class="actions-row">
                <button type="submit" class="button success">Mettre à jour</button>
                <a class="back" href="{{ route('catalogue.list') }}">Retour au catalogue</a>
            </div>
        </form>
    </div>
</body>
</html>
