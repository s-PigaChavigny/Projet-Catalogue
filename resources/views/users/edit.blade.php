<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
</head>
<body>
    @include('partials.header')
    <h1>Modifier un utilisateur</h1>
    <form method="POST" action="{{ route('user.edit', $user->id) }}">
        @csrf
        @include('users.form', ['editing' => true])
        <button type="submit" class="button secondary">Enregistrer</button>
    </form>
    @include('partials.footer')
</body>
</html>