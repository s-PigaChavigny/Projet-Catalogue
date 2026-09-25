<footer class="site-footer">
    <div class="footer-inner">
        <div class="brand-block">
            <a href="{{ url('/') }}" class="brand"><img src="{{ asset('images/logo_projet_catalogue.png') }}" alt="Logo ArtRef"></a>
        </div>

        <nav class="footer-nav" aria-label="Navigation principale">
            <a href="{{ route('evenement.list') }}">Événements</a>
            <a href="{{ route('boutique.list') }}">Boutiques</a>
            <a href="{{ route('profile') }}">Mon profil</a>
            @if(Auth::check() && Auth::user()->access_level === 'admin')
                <a href="{{ route('admin') }}">Admin</a>
            @endif
        </nav>
        <div>
            <p> © ArtRef - {{date'Y'}} - Tous droits réservés </p>
        </div>
    </div>
</footer>
