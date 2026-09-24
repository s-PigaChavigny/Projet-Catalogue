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
                <p>{{ $boutique?->name ?? 'Boutique non sélectionnée' }}</p>
                <input type="hidden" name="boutique_id" value="{{ $boutiqueId }}">
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
                <a href="{{ route('boutique.list') }}" class="back">Retour</a>
            </div>
        </form>

        @if($boutiqueId > 0)
            <div class="form-shell" style="padding-top: 0; min-height: auto;">
                <div style="width: min(1000px, 100%); background: rgba(255,255,255,0.9); border: 2px solid #ffd7a8; border-radius: 28px; box-shadow: 0 18px 45px rgba(255, 134, 134, 0.12); padding: 28px;">
                    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr;">
                        <div>
                            <h2>Produits disponibles</h2>
                            @if($availableProduits->isEmpty())
                                <p>Aucun produit disponible pour cette boutique.</p>
                            @else
                                @foreach($availableProduits as $produit)
                                    <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; border:1px solid #ffd7a8; border-radius:12px; padding:10px 12px; margin-bottom:10px;">
                                        <span>{{ $produit->name }}</span>
                                        <form method="POST" action="{{ route('catalogue.create') }}">
                                            @csrf
                                            <input type="hidden" name="boutique_id" value="{{ $boutiqueId }}">
                                            <input type="hidden" name="evenement_id" value="{{ request('evenement_id', 0) }}">
                                            <button type="submit" class="button primary">Créer d’abord</button>
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div>
                            <h2>Produits déjà dans le catalogue</h2>
                            <p>Le catalogue est vide tant qu’il n’a pas été créé.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
