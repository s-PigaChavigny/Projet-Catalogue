<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $boutique->name }}</title>
</head>
<body>
    @include('partials.header')
    
    @php
        $canManageCatalogues = auth()->check() && (
            auth()->user()->access_level === 'admin'
            || (auth()->user()->access_level === 'artist' && (int) auth()->user()->boutique_id === (int) $boutique->id)
        );
    @endphp
    <div class="page">
        <article class="boutique-detail-card">
            <div class="boutique-detail-media">
                @if($boutique->image_path)
                    <img src="{{ asset($boutique->image_path) }}" alt="{{ $boutique->name }}">
                @else
                    <div class="boutique-detail-placeholder">Aucune image disponible</div>
                @endif
            </div>

            <div class="boutique-detail-content">
                <span class="home-card-tag">Boutique</span>
                <h1>{{ $boutique->name }}</h1>
                <p class="boutique-detail-description">{{ $boutique->description }}</p>
                <p class="boutique-detail-contact"><strong>Contact :</strong> {{ $boutique->contact_info }}</p>
            </div>
        </article>

        @if($canManageCatalogues)
            <div class="boutique-management-actions actions-row">
                <a href="{{ route('catalogue.view_create', ['boutique_id' => $boutique->id]) }}" class="button primary">Créer un catalogue</a>
                <a href="{{ route('produit.view_create', ['boutique_id' => $boutique->id]) }}" class="button primary">Ajouter un produit</a>
            </div>
        @endif

        <section class="boutique-catalogues-section" aria-labelledby="catalogues-title">
            <h2 id="catalogues-title">Catalogues associés</h2>
            @if($catalogues->isNotEmpty())
                <div class="boutique-catalogues-grid">
                    @foreach($catalogues as $catalogue)
                        @php
                            $catalogueEvenement = \App\Models\Evenement::find($catalogue->evenement_id);
                        @endphp
                        <article class="card boutique-catalogue-card">
                            <h3>{{ $catalogueEvenement?->name ?? 'Catalogue #' . $catalogue->id }}</h3>
                            <div class="actions-row">
                                <a class="button primary" href="{{ route('catalogue.show', $catalogue->id) }}">Voir le catalogue</a>
                                @if($canManageCatalogues)
                                    <a href="{{ route('catalogue.edit_view', $catalogue->id) }}" class="button secondary">Modifier</a>
                                    <a href="{{ route('catalogue.delete', $catalogue->id) }}" class="button danger">Supprimer</a>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <p class="empty">Aucun catalogue associé pour le moment.</p>
            @endif
        </section>

        <a class="button secondary" href="{{ route('boutique.list') }}">← Retour à la liste</a>
    </div>
    @include('partials.footer')
</body>
</html>
