<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $boutique->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
    @include('partials.header')
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
                    <img class="image" src="{{ $boutique->image_path }}" alt="{{ $boutique->name }}">
                @endif

                <div class="meta">
                    <h2>Catalogues associés</h2>
                    @if($catalogues->isNotEmpty())
                        <ul>
                            @foreach($catalogues as $catalogue)
                                <li>
                                    <a href="{{ route('catalogue.show', $catalogue->id) }}">{{ $catalogue->name ?? 'Catalogue #' . $catalogue->id }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Aucun catalogue associé pour le moment.</p>
                    @endif
                </div>

                <div class="actions-row">
                    <a href="{{ route('catalogue.view_create', ['boutique_id' => $boutique->id]) }}" class="button primary">Créer un catalogue</a>
                </div>
            </div>
        </div>
        <a class="back" href="{{ route('boutique.list') }}">← Retour à la liste</a>
    </div>
</body>
</html>
