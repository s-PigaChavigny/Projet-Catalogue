<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un utilisateur</title>
</head>
<body>
    @include('partials.header')
    <div class="page">
        <div class="form-shell">
            <h1 class="form-title">Créer un utilisateur</h1>
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                @include('users.form')
                <button type="submit" class="button primary">Créer</button>
            </form>
        </div>
    </div>
    @include('partials.footer')
</body>
</html>