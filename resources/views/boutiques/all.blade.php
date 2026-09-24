<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes boutiques</title>
</head>
<body>
    @include('partials.header')
    <div class="container">
        <div class="topbar">
            <div>
                <div class="badge">Boutiques du moment ✨</div>
                <h1>Découvre nos joyeux lieux</h1>
            </div>
            <a class="cta" href="{{ route('boutique.view_create') }}">+ Ajouter une boutique</a>
        </div>

        @if($boutiques->isEmpty())
            <div class="empty">
                Aucune boutique pour le moment. <br>
                Crée la première pour lancer la bonne humeur !
            </div>
        @else
            <div class="grid">
                @foreach($boutiques as $boutique)
                    <article class="card">
                        <span class="mini-tag">Boutique</span>
                        <h2>{{ $boutique->name }}</h2>
                        <p>{{ $boutique->description }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('boutique.show', $boutique->id) }}">Voir</a>
                            <a class="link secondary" href="{{ route('boutique.edit_view', $boutique->id) }}">Modifier</a>
                            <a class="link danger" href="{{ route('boutique.delete', $boutique->id) }}">Supprimer</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
