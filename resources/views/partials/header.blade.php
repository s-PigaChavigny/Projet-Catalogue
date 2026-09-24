<header class="site-header">
    <div class="header-inner">
        <div class="brand-block">
            <a href="{{ url('/') }}" class="brand"><img src="{{ asset('images/logo_projet_catalogue.png') }}" alt="Logo ArtRef"></a>
        </div>

        <form action="{{ route('search') }}" method="GET" class="search-form">
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Rechercher un lieu, événement..."
                aria-label="Recherche"
            >
            <button type="submit">Chercher</button>
        </form>

        <nav class="header-nav" aria-label="Navigation principale">
            <a href="{{ route('evenement.list') }}">Événements</a>
            <a href="{{ route('boutique.list') }}">Boutiques</a>
            <a href="{{ route('profile') }}">Mon profil</a>
            @if(Auth::check() && Auth::user()->access_level === 'admin')
                <a href="{{ route('admin') }}">Admin</a>
            @endif
            @if(Auth::check())
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-button">Se déconnecter</button>
                </form>
            @else
                <a href="{{ route('login') }}">Se connecter</a>
            @endif
        </nav>
    </div>
</header>
