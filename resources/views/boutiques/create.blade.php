<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une boutique</title>
</head>
<body>
    @include('partials.header')
    <div class="form-shell">
        <form method="POST" action="{{ route('boutique.create') }}" enctype="multipart/form-data">
            @csrf
            <h1 class="form-title">✨ Créer une boutique</h1>

            <div class="field">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" placeholder="Ex : La Maison des Étoiles" required>
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Décris ton boutique en quelques lignes..."></textarea>
            </div>

            <div class="field">
                <label for="contact_info">Contact</label>
                <input id="contact_info" type="text" name="contact_info" placeholder="Téléphone, email ou adresse">
            </div>

            <div class="field">
                <label for="image">Image</label>
                <input id="image" type="file" name="image" accept="image/*">
            </div>

            <div class="actions-row">
                <button type="submit" class="button primary">Enregistrer</button>
                <a class="back" href="{{ route('boutique.list') }}">Retour</a>
            </div>
        </form>
    </div>
    @include('partials.footer')
</body>
</html>
