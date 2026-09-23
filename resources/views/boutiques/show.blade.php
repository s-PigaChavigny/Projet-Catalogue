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

                <a class="back" href="{{ route('boutique.list') }}">← Retour à la liste</a>
            </div>
        </div>
    </div>
</body>
</html>
