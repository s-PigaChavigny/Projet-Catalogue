<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un produit</title>
</head>
<body>
    @include('partials.header')
    <div>
        <form method="POST" action="{{ route('produit.create') }}" enctype="multipart/form-data">
            @csrf
            <h1>Créer un produit</h1>

            <div>
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" placeholder="Ex : Porte-clefs" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Décris ton produit..."></textarea>
            </div>

            <div>
                <label for="boutique_id">Boutique</label>
                @if(auth()->user()->access_level === 'artist')
                    <p>{{ $boutiques->first()?->name ?? 'Aucune boutique associée' }}</p>
                    <input type="hidden" name="boutique_id" value="{{ $boutiques->first()?->id }}">
                @else
                    <select id="boutique_id" name="boutique_id" required>
                        <option value="">Choisir une boutique</option>
                        @foreach($boutiques as $boutique)
                            <option value="{{ $boutique->id }}">{{ $boutique->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div>
                <label for="image">Image</label>
                <input id="image" type="file" name="image" accept="image/*">
            </div>
            
            <div>
                <label for="price">Prix</label>
                <input id="price" type="number" name="price" required> <!--min="0.00" max="10000.00" step="0.01" -->
            </div>

            <div>
                <button type="submit" class="button primary">Enregistrer</button>
                @php($selectedBoutiqueId = old('boutique_id', auth()->user()->boutique_id))
                @if($selectedBoutiqueId)
                    <a href="{{ route('boutique.produits', $selectedBoutiqueId) }}">Retour aux produits</a>
                @else
                    <a href="{{ route('boutique.list') }}">Retour aux boutiques</a>
                @endif
            </div>
        </form>
    </div>
    @include('partials.footer')
</body>
</html>
