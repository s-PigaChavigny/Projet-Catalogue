<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un catalogue</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
</head>
<body>
    @include('partials.header')

    <div class="form-shell">
        <form method="POST" action="{{ route('catalogue.edit', $catalogue->id) }}">
            @csrf
            <h1 class="form-title">Modifier le catalogue</h1>

            <div class="field">
                <label for="boutique_id">Boutique</label>
                <input id="boutique_id" type="number" name="boutique_id" value="{{ $catalogue->boutique_id }}" required>
            </div>

            <div class="field">
                <label for="evenement_id">Événement</label>
                <input id="evenement_id" type="number" name="evenement_id" value="{{ $catalogue->evenement_id }}" required>
            </div>

            <div class="actions-row">
                <button type="submit" class="button primary">Enregistrer</button>
                <a href="{{ route('catalogue.show', $catalogue->id) }}" class="back">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>
