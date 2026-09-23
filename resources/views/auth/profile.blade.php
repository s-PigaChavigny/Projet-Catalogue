<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
</head>
<body>
    @include('partials.header')

    <div class="profile-card">
        <h1>Mon profil</h1>

        <div class="profile-info">
            <div class="profile-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div>
                <p class="profile-name">{{ $user->name }}</p>
                <p class="profile-email">{{ $user->email }}</p>
                <p class="profile-role">Rôle : {{ $user->access_level ?? 'user' }}</p>
            </div>
        </div>

        <div class="actions-row profile-actions">
            <a href="{{ route('search') }}" class="button secondary">Rechercher</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button primary">Se déconnecter</button>
            </form>
        </div>
    </div>
</body>
</html>
