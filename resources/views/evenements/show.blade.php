<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $evenement->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
    @include('partials.header')
    <div class="page">
        <div class="detail-card">
            <div class="hero">
                <h1>{{ $evenement->name }}</h1>
            </div>

            <div class="content">
                <p>{{ $evenement->description }}</p>

                <div class="meta">
                    📅 Date : {{ $evenement->date }}
                </div>

                <div class="meta">
                    📍 Lieu : {{ $evenement->lieu }}
                </div>

                @if($evenement->lien_web)
                    <div class="meta">
                        🔗 Site : <a href="{{ $evenement->lien_web }}" target="_blank" rel="noopener noreferrer">{{ $evenement->lien_web }}</a>
                    </div>
                @endif

                @if($evenement->image_path)
                    <img class="image" src="{{ $evenement->image_path }}" alt="{{ $evenement->name }}">
                @endif

                <div class="meta">
                    <h2>Catalogues associés</h2>
                    @if($catalogues->isNotEmpty())
                        <ul>
                            @foreach($catalogues as $catalogue)
                                @php
                                    $catalogueBoutique = \App\Models\Boutique::find($catalogue->boutique_id);
                                @endphp
                                <li>
                                    <a href="{{ route('catalogue.show', $catalogue->id) }}">
                                        {{ $catalogueBoutique?->name ?? 'Catalogue #' . $catalogue->id }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Aucun catalogue associé pour le moment.</p>
                    @endif
                </div>

                <a class="back" href="{{ route('evenement.list') }}">← Retour à la liste</a>
            </div>
        </div>
    </div>
</body>
</html>
