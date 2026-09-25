<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un catalogue</title>
</head>
<body>
    @include('partials.header')

    <div class="form-shell">
        <form method="POST" action="{{ route('catalogue.create') }}">
            @csrf
            <h1 class="form-title">Créer un catalogue</h1>

            <div class="field">
                <label>Boutique</label>
                @if(auth()->check() && auth()->user()->access_level === 'admin')
                    <select id="boutique_id" name="boutique_id" required>
                        <option value="">Choisir une boutique</option>
                        @foreach(App\Models\Boutique::all() as $boutique)
                            <option value="{{ $boutique->id }}" {{ $boutiqueId == $boutique->id ? 'selected' : '' }}>{{ $boutique->name }}</option>
                        @endforeach
                    </select>
                @else
                    <p>{{ $boutique?->name ?? 'Boutique non sélectionnée' }}</p>
                    <input type="hidden" name="boutique_id" value="{{ $boutiqueId }}">
                @endif
            </div>

            <div class="field">
                <label for="evenement_id">Événement</label>
                <select id="evenement_id" name="evenement_id" required>
                    <option value="">Choisir un événement</option>
                    @foreach(App\Models\Evenement::all() as $evenement)
                        <option value="{{ $evenement->id }}">{{ $evenement->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="actions-row">
                <button type="submit" class="button primary">Créer le catalogue</button>
                <a href="{{ route('boutique.list') }}" class="button secondary">Retour</a>
            </div>
        </form>
    </div>
    @include('partials.footer')
</body>
</html>
