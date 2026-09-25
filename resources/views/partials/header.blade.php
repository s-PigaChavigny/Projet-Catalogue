<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Happy+Monkey&family=Lemon&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

<header>
    <div>
        <div>
            <a href="{{ url('/') }}" class="brand"><img src="{{ asset('images/logo_projet_catalogue.png') }}" alt="Logo ArtRef"></a>
        </div>

        <form action="{{ route('search') }}" method="GET">
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Rechercher un lieu, événement..."
                aria-label="Recherche"
            >
            <button type="submit" class="button secondary">Chercher</button>
        </form>

        <nav aria-label="Navigation principale">
            <a href="{{ route('evenement.list') }}">Événements</a>
            <a href="{{ route('boutique.list') }}">Boutiques</a>
            <a href="{{ route('profile') }}" class="button primary">Mon profil</a>
            @if(Auth::check() && Auth::user()->access_level === 'admin')
                <a href="{{ route('admin') }}" class="button danger">Admin</a>
            @endif
            @if(Auth::check())
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="button danger">Se déconnecter</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="button primary">Se connecter</a>
            @endif
        </nav>
    </div>
</header>
