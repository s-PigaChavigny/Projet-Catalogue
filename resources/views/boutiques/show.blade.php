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
        <div class="detail-card">
            <div class="hero">
                <h1>{{ $boutique->name }}</h1>
            </div>

            <div class="content">
                <p>{{ $boutique->description }}</p>

                <div class="meta">
                    📞 Contact : {{ $boutique->contact_info }}
                </div>

                @if($boutique->image_path)
                    <img class="image" src="{{ asset($boutique->image_path) }}" alt="{{ $boutique->name }}">
                @endif

                <div class="meta">
                    <h2>Catalogues associés</h2>
                    @if($catalogues->isNotEmpty())
                        <ul>
                            @foreach($catalogues as $catalogue)
                                @php
                                    $catalogueEvenement = \App\Models\Evenement::find($catalogue->evenement_id);
                                @endphp
                                <li>
                                    <a href="{{ route('catalogue.show', $catalogue->id) }}">
                                        {{ $catalogueEvenement?->name ?? 'Catalogue #' . $catalogue->id }}
                                    </a>
                                    @if($canManageCatalogues)
                                        <a href="{{ route('catalogue.edit_view', $catalogue->id) }}">Modifier</a>
                                        <a href="{{ route('catalogue.delete', $catalogue->id) }}">Supprimer</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Aucun catalogue associé pour le moment.</p>
                    @endif
                </div>

                @if($canManageCatalogues)
                    <div class="actions-row">
                        <a href="{{ route('catalogue.view_create', ['boutique_id' => $boutique->id]) }}" class="button primary">Créer un catalogue</a>
                        <a href="{{ route('produit.view_create', ['boutique_id' => $boutique->id]) }}" class="button primary">Ajouter un produit</a>
                    </div>
                @endif
            </div>
        </div>
        <a class="back" href="{{ route('boutique.list') }}">← Retour à la liste</a>
    </div>
</body>
</html>
