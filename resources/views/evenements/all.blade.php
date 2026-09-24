<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événements</title>
</head>
<body>
    @include('partials.header')
    <div class="container">
        <div class="topbar">
            <div>
                <div class="badge">À ne pas manquer ✨</div>
                <h1>Événements joyeux</h1>
            </div>
            @if(auth()->check() && auth()->user()->access_level === 'admin')
                <a class="cta" href="{{ route('evenement.view_create') }}">+ Ajouter un événement</a>
            @endif
        </div>

        @if($evenements->isEmpty())
            <div class="empty">
                Aucun événement pour le moment. <br>
                Crée le premier pour faire vibrer la communauté !
            </div>
        @else
            <div class="grid">
                @foreach($evenements as $evenement)
                    <article class="card">
                        <span class="mini-tag">Événement</span>
                        <h2>{{ $evenement->name }}</h2>
                        <p>{{ $evenement->description }}</p>
                        <p><strong>Date :</strong> {{ $evenement->date }}</p>
                        <p><strong>Lieu :</strong> {{ $evenement->lieu }}</p>

                        <div class="actions">
                            <a class="link primary" href="{{ route('evenement.show', $evenement->id) }}">Voir</a>
                            @if(auth()->check() && auth()->user()->access_level === 'admin')
                                <a class="link secondary" href="{{ route('evenement.edit_view', $evenement->id) }}">Modifier</a>
                                <a class="link danger" href="{{ route('evenement.delete', $evenement->id) }}">Supprimer</a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
