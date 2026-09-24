<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
</head>
<body>
    @include('partials.header')
    
    <div class="profile-card">
        <h1>Mon profil</h1>

        <div class="profile-info">
            <!-- <div class="profile-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div> -->
            <div>
                <p class="profile-name">{{ $user->name }}</p>
                <p class="profile-email">{{ $user->email }}</p>
                <p class="profile-role">Rôle : {{ $user->access_level ?? 'user' }}</p>
            </div>
        </div>

        <div class="actions-row profile-actions">
            @if($user->access_level === 'artist' && $boutique)
                <a href="{{ route('boutique.show', $boutique->id) }}" class="button secondary">Ma boutique</a>
                <a href="{{ route('catalogue.view_create', ['boutique_id' => $boutique->id]) }}" class="button primary">Créer un catalogue</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button primary">Se déconnecter</button>
            </form>
        </div>

        @if($user->access_level === 'artist' && $boutique)
            <h2>Catalogues de ma boutique</h2>
            @if($catalogues->isEmpty())
                <p>Aucun catalogue associé à votre boutique.</p>
            @else
                <ul>
                    @foreach($catalogues as $catalogue)
                        <li>
                            <a href="{{ route('catalogue.show', $catalogue->id) }}">Catalogue #{{ $catalogue->id }}</a>
                            <a href="{{ route('catalogue.edit_view', $catalogue->id) }}">Modifier</a>
                            <a href="{{ route('catalogue.delete', $catalogue->id) }}">Supprimer</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    </div>
</body>
</html>
