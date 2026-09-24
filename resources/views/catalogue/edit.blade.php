<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un catalogue</title>
</head>
<body>
    @include('partials.header')

    <div class="form-shell">
        <form method="POST" action="{{ route('catalogue.edit', $catalogue->id) }}">
            @csrf
            <h1 class="form-title">Modifier le catalogue</h1>

            <div class="field">
                <label for="boutique_id">Boutique</label>
                <select id="boutique_id" name="boutique_id" required>
                    @foreach(App\Models\Boutique::all() as $boutique)
                        <option value="{{ $boutique->id }}" {{ $catalogue->boutique_id == $boutique->id ? 'selected' : '' }}>
                            {{ $boutique->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="evenement_id">Événement</label>
                <select id="evenement_id" name="evenement_id" required>
                    @foreach(App\Models\Evenement::all() as $evenement)
                        <option value="{{ $evenement->id }}" {{ $catalogue->evenement_id == $evenement->id ? 'selected' : '' }}>
                            {{ $evenement->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="actions-row">
                <button type="submit" class="button primary">Enregistrer</button>
                <a href="{{ route('catalogue.show', $catalogue->id) }}" class="back">Retour</a>
            </div>
        </form>

        <div style="width: min(1000px, 100%); background: rgba(255,255,255,0.9); border: 2px solid #ffd7a8; border-radius: 28px; box-shadow: 0 18px 45px rgba(255, 134, 134, 0.12); padding: 28px; margin-top: 30px;">
            <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr;">
                <div style="background: #fffaf4; border: 1px solid #ffe0b3; border-radius: 18px; padding: 18px;">
                    <h2 style="margin-top: 0;">Produits disponibles</h2>
                    @if($availableProduits->isEmpty())
                        <p>Aucun produit disponible pour cette boutique.</p>
                    @else
                        @foreach($availableProduits as $produit)
                            <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; border:1px solid #ffd7a8; border-radius:12px; padding:10px 12px; margin-bottom:10px; background: white;">
                                <span>{{ $produit->name }}</span>
                                <form method="POST" action="{{ route('catalogue.add_product', $catalogue->id) }}">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <button type="submit" class="button primary">Ajouter</button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div style="background: #f6fffb; border: 1px solid #ccebd6; border-radius: 18px; padding: 18px;">
                    <h2 style="margin-top: 0;">Produits déjà dans le catalogue</h2>
                    @if($catalogueProduits->isEmpty())
                        <p>Aucun produit associé pour le moment.</p>
                    @else
                        @foreach($catalogueProduits as $produit)
                            <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; border:1px solid #cfead9; border-radius:12px; padding:10px 12px; margin-bottom:10px; background: white;">
                                <span>{{ $produit->name }}</span>
                                <form method="POST" action="{{ route('catalogue.remove_product', $catalogue->id) }}">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <button type="submit" class="button secondary">Retirer</button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
