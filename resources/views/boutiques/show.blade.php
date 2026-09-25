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
    <div>
        <div>
            <div>
                <h1>{{ $boutique->name }}</h1>
            </div>

            <div>
                <p>{{ $boutique->description }}</p>

                <div>
                    Contact : {{ $boutique->contact_info }}
                </div>

                @if($boutique->image_path)
                    <img src="{{ asset($boutique->image_path) }}" alt="{{ $boutique->name }}">
                @endif

                <div>
                    <h2>Catalogues associés</h2>
                    @if($catalogues->isNotEmpty())
                        <ul>
                            @foreach($catalogues as $catalogue)
                                @php
                                    $catalogueEvenement = \App\Models\Evenement::find($catalogue->evenement_id);
                                @endphp
                                <li>
                                        <a class="button primary" href="{{ route('catalogue.show', $catalogue->id) }}">
                                        {{ $catalogueEvenement?->name ?? 'Catalogue #' . $catalogue->id }}
                                    </a>
                                    @if($canManageCatalogues)
                                        <a href="{{ route('catalogue.edit_view', $catalogue->id) }}" class="button secondary">Modifier</a>
                                        <a href="{{ route('catalogue.delete', $catalogue->id) }}" class="button danger">Supprimer</a>
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
                        <a class="button secondary" href="{{ route('boutique.list') }}">← Retour à la liste</a>
    </div>
    @include('partials.footer')
</body>
</html>
