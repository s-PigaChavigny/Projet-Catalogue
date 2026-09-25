<footer>
    <div>

        <nav class="footer-nav" aria-label="Navigation secondaire">
            <a href="{{ route('evenement.list') }}">Événements</a>
            <a href="{{ route('boutique.list') }}">Boutiques</a>
            <a href="{{ route('profile') }}">Mon profil</a>
            @if(Auth::check() && Auth::user()->access_level === 'admin')
                <a href="{{ route('admin') }}">Admin</a>
            @endif
        </nav>
        <div class="footer-legal">
            <p> © ArtRef {{date('Y')}} - Tous droits réservés </p>
        </div>
    </div>
</footer>
