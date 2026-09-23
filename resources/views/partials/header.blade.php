<header class="site-header">
    <div class="header-inner">
        <div class="brand-block">
            <a href="{{ url('/') }}" class="brand">JoyBox</a>
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
        </nav>
    </div>
</header>
