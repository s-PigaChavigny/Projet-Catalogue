<h1>Catalogue: {{ $catalogue->name }}</h1>

<h2>Produits associés:</h2>
<ul>
    @foreach($produits as $produit)
        <li>
            <a href="{{ route('produit.show', $produit->id) }}">
                {{ $produit->name }}
            </a>
        </li>
    @endforeach
</ul>