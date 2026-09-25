<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    @include('partials.header')
    <main class="admin-page">
        <section class="admin-intro">
            <h1>Dashboard administrateur</h1>
            <p>Gérez les contenus du catalogue ArtRef.</p>
        </section>

        <section class="admin-section" aria-labelledby="admin-events-title">
            <div class="admin-section-heading">
                <h2 id="admin-events-title">Événements</h2>
                <a href="{{ route('evenement.view_create') }}" class="button primary">Ajouter</a>
            </div>
            <div class="admin-grid">
                @forelse($evenements as $evenement)
                    <article class="card admin-card">
                        <h3>{{ $evenement->name }}</h3>
                        <p><strong>Date :</strong> {{ $evenement->date }}</p>
                        <p><strong>Lieu :</strong> {{ $evenement->lieu }}</p>
                        <div class="actions">
                            <a href="{{ route('evenement.show', $evenement->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('evenement.edit_view', $evenement->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('evenement.delete', $evenement->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @empty
                    <p class="empty">Aucun événement.</p>
                @endforelse
            </div>
        </section>

        <section class="admin-section" aria-labelledby="admin-shops-title">
            <div class="admin-section-heading">
                <h2 id="admin-shops-title">Boutiques</h2>
                <a href="{{ route('boutique.view_create') }}" class="button primary">Ajouter</a>
            </div>
            <div class="admin-grid">
                @forelse($boutiques as $boutique)
                    <article class="card admin-card">
                        <h3>{{ $boutique->name }}</h3>
                        <p>{{ $boutique->contact_info }}</p>
                        <div class="actions">
                            <a href="{{ route('boutique.show', $boutique->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('boutique.edit_view', $boutique->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('boutique.delete', $boutique->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @empty
                    <p class="empty">Aucune boutique.</p>
                @endforelse
            </div>
        </section>

        <section class="admin-section" aria-labelledby="admin-catalogues-title">
            <div class="admin-section-heading">
                <h2 id="admin-catalogues-title">Catalogues</h2>
                <a href="{{ route('catalogue.view_create') }}" class="button primary">Ajouter</a>
            </div>
            <div class="admin-grid">
                @forelse($catalogues as $catalogue)
                    <article class="card admin-card">
                        <h3>{{ $catalogue->name ?? 'Catalogue #' . $catalogue->id }}</h3>
                        <p><strong>Boutique :</strong> {{ $catalogue->boutique?->name ?? 'Non associée' }}</p>
                        <p><strong>Événement :</strong> {{ $catalogue->evenement?->name ?? 'Non associé' }}</p>
                        <div class="actions">
                            <a href="{{ route('catalogue.show', $catalogue->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('catalogue.edit_view', $catalogue->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('catalogue.delete', $catalogue->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @empty
                    <p class="empty">Aucun catalogue.</p>
                @endforelse
            </div>
        </section>

        <section class="admin-section" aria-labelledby="admin-products-title">
            <div class="admin-section-heading">
                <h2 id="admin-products-title">Produits</h2>
                <a href="{{ route('produit.view_create') }}" class="button primary">Ajouter</a>
            </div>
            <div class="admin-grid">
                @forelse($produits as $produit)
                    <article class="card admin-card">
                        @if($produit->image_path)
                            <img class="admin-card-image" src="{{ asset($produit->image_path) }}" alt="{{ $produit->name }}">
                        @endif
                        <h3>{{ $produit->name }}</h3>
                        <p><strong>Boutique :</strong> {{ $produit->boutique?->name ?? 'Non associée' }}</p>
                        <p class="catalogue-product-price">{{ number_format((float) $produit->price, 2, ',', ' ') }} €</p>
                        <div class="actions">
                            <a href="{{ route('produit.show', $produit->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('produit.edit_view', $produit->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('produit.delete', $produit->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @empty
                    <p class="empty">Aucun produit.</p>
                @endforelse
            </div>
        </section>

        <section class="admin-section" aria-labelledby="admin-users-title">
            <div class="admin-section-heading">
                <h2 id="admin-users-title">Utilisateurs</h2>
                <a href="{{ route('user.create') }}" class="button primary">Ajouter</a>
            </div>
            <div class="admin-grid">
                @forelse($users as $user)
                    <article class="card admin-card">
                        <h3>{{ $user->name }}</h3>
                        <p>{{ $user->email }}</p>
                        <p><strong>Profil :</strong> {{ $user->access_level }}</p>
                        <div class="actions">
                            <a href="{{ route('user.show', $user->id) }}" class="button primary">Voir</a>
                            <a href="{{ route('user.edit_view', $user->id) }}" class="button secondary">Modifier</a>
                            <a href="{{ route('user.delete', $user->id) }}" class="button danger">Supprimer</a>
                        </div>
                    </article>
                @empty
                    <p class="empty">Aucun utilisateur.</p>
                @endforelse
            </div>
        </section>
    </main>
    </div>
    @include('partials.footer')
</body>
</html>
