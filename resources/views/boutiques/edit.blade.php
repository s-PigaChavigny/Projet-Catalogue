<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une boutique</title>
</head>
<body>
    @include('partials.header')
    <div>
        <form method="POST" action="{{ route('boutique.edit', $boutique->id) }}">
            @csrf
            <h1>Modifier la boutique</h1>

            <div>
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ $boutique->name }}" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $boutique->description }}</textarea>
            </div>

            <div>
                <label for="contact_info">Contact</label>
                <input id="contact_info" type="text" name="contact_info" value="{{ $boutique->contact_info }}">
            </div>

            <div>
                <label for="image_path">Image</label>
                <input id="image_path" type="text" name="image_path" value="{{ $boutique->image_path }}">
            </div>

            <div>
                <button type="submit" class="button primary">Mettre à jour</button>
                <a class="button secondary" href="{{ route('boutique.list') }}">Retour</a>
            </div>
        </form>
    </div>
    @include('partials.footer')
</body>
</html>
