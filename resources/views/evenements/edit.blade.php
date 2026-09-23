<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un événement</title>
    <link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
    @include('partials.header')
    <div class="form-shell">
        <form method="POST" action="{{ route('evenement.edit', $evenement->id) }}">
            @csrf
            <h1 class="form-title">✏️ Modifier l'événement</h1>

            <div class="field">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ $evenement->name }}" required>
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $evenement->description }}</textarea>
            </div>

            <div class="field">
                <label for="date">Date</label>
                <input id="date" type="date" name="date" value="{{ $evenement->date }}" required>
            </div>

            <div class="field">
                <label for="lieu">Lieu</label>
                <input id="lieu" type="text" name="lieu" value="{{ $evenement->lieu }}" required>
            </div>

            <div class="field">
                <label for="image_path">Image</label>
                <input id="image_path" type="text" name="image_path" value="{{ $evenement->image_path }}">
            </div>

            <div class="field">
                <label for="lien_web">Lien web</label>
                <input id="lien_web" type="url" name="lien_web" value="{{ $evenement->lien_web }}">
            </div>

            <div class="actions-row">
                <button type="submit" class="button success">Mettre à jour</button>
                <a class="back" href="{{ route('evenement.list') }}">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>
