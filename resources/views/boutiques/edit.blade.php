<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une boutique</title>
</head>
<body>
    @include('partials.header')
    <div class="form-shell">
        <form method="POST" action="{{ route('boutique.edit', $boutique->id) }}">
            @csrf
            <h1 class="form-title">✏️ Modifier la boutique</h1>

            <div class="field">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ $boutique->name }}" required>
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $boutique->description }}</textarea>
            </div>

            <div class="field">
                <label for="contact_info">Contact</label>
                <input id="contact_info" type="text" name="contact_info" value="{{ $boutique->contact_info }}">
            </div>

            <div class="field">
                <label for="image_path">Image</label>
                <input id="image_path" type="text" name="image_path" value="{{ $boutique->image_path }}">
            </div>

            <div class="actions-row">
                <button type="submit" class="button success">Mettre à jour</button>
                <a class="back" href="{{ route('boutique.list') }}">Retour</a>
            </div>
        </form>
    </div>
    @include('partials.footer')
</body>
</html>
