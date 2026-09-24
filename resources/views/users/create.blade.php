<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un utilisateur</title>
</head>
<body>
    @include('partials.header')
    <h1>Créer un utilisateur</h1>
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        @include('users.form')
        <button type="submit">Créer</button>
    </form>
</body>
</html>