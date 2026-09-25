<footer>
    <div>

        <nav>
            <a href="{{ route('evenement.list') }}">Événements</a>
            <a href="{{ route('boutique.list') }}">Boutiques</a>
            <a href="{{ route('profile') }}">Mon profil</a>
            @if(Auth::check() && Auth::user()->access_level === 'admin')
                <a href="{{ route('admin') }}">Admin</a>
            @endif
        </nav>
        <div>
            <p> © ArtRef {{date('Y')}} - Tous droits réservés </p>
        </div>
    </div>
</footer>
