<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
</head>
<body>
    @include('partials.header')
    <h1 class="titre-page">Utilisateurs</h1>
    <a class="button primary" href="{{ route('user.create') }}">Ajouter un utilisateur</a>

    @forelse($users as $user)
        <article class="card">
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
            <p>Niveau : {{ $user->access_level }}</p>
            <a class="button primary" href="{{ route('user.show', $user->id) }}">Voir</a>
            <a class="button secondary" href="{{ route('user.edit_view', $user->id) }}">Modifier</a>
            <a class="button danger" href="{{ route('user.delete', $user->id) }}">Supprimer</a>
        </article>
    @empty
        <p>Aucun utilisateur.</p>
    @endforelse
    @include('partials.footer')
</body>
</html>