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
                @if(auth()->user()->access_level === 'artist')
                    <p>{{ $boutique?->name ?? 'Boutique associée' }}</p>
                    <input type="hidden" name="boutique_id" value="{{ $catalogue->boutique_id }}">
                @else
                    <select id="boutique_id" name="boutique_id" required>
                        @foreach($boutiques as $boutique)
                            <option value="{{ $boutique->id }}" @selected($catalogue->boutique_id == $boutique->id)>{{ $boutique->name }}</option>
                        @endforeach
                    </select>
                @endif
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
                <a href="{{ route('catalogue.show', $catalogue->id) }}" class="button secondary">Retour</a>
            </div>
        </form>

        <div>
            <div >
                <div>
                    <h2 >Produits disponibles</h2>
                    @if($availableProduits->isEmpty())
                        <p>Aucun produit disponible pour cette boutique.</p>
                    @else
                        @foreach($availableProduits as $produit)
                            <div>
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

                <div>
                    <h2>Produits déjà dans le catalogue</h2>
                    @if($catalogueProduits->isEmpty())
                        <p>Aucun produit associé pour le moment.</p>
                    @else
                        @foreach($catalogueProduits as $produit)
                            <div>
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
    @include('partials.footer')
</body>
</html>
