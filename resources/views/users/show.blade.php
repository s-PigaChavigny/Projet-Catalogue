<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}</title>
</head>
<body>
    @include('partials.header')
    <h1>{{ $user->name }}</h1>
    <p>Email : {{ $user->email }}</p>
    <p>Niveau : {{ $user->access_level }}</p>
    <p>Boutique associée : {{ $user->boutique?->name ?? 'Aucune' }}</p>

    <a class="button secondary" href="{{ route('user.edit_view', $user->id) }}">Modifier</a>
    <a class="button secondary" href="{{ route('user.list') }}">Retour aux utilisateurs</a>
    @include('partials.footer')
</body>
</html>