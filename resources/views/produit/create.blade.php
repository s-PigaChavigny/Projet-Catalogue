<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un produit</title>
</head>
<body>
    @include('partials.header')
    <div class="form-shell">
        <form method="POST" action="{{ route('produit.create') }}" enctype="multipart/form-data">
            @csrf
            <h1 class="form-title">Créer un produit</h1>

            <div class="field">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" placeholder="Ex : Festival des saveurs" required>
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Décris ton événement..."></textarea>
            </div>

            <div class="field">
                <label for="image">Image</label>
                <input id="image" type="file" name="image" accept="image/*">
            </div>
            
            <div class="field">
                <label for="price">Prix</label>
                <input id="price" type="number" name="price" required> <!--min="0.00" max="10000.00" step="0.01" -->
            </div>

            <div class="actions-row">
                <button type="submit" class="button primary">Enregistrer</button>
                <a class="back" href="{{ route('catalogue.list') }}">Retour au catalogue</a>
            </div>
        </form>
    </div>
</body>
</html>
