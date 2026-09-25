<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ArtRef - Recherche</title>
</head>
<body>
    @include('partials.header')

	<main class="container">
		<section class="home-section">
			<h1>Résultats pour « {{ $search }} »</h1>
		</section>

		<section class="home-section" aria-labelledby="evenements-title">
			<h2 id="evenements-title">Événements</h2>
			<div class="grid">
				@forelse ($evenements as $evenement)
					<article class="card">
						<h3>{{ $evenement->name }}</h3>
						<p>{{ $evenement->description }}</p>
						<p><strong>Date :</strong> {{ $evenement->date }}</p>
						<p><strong>Lieu :</strong> {{ $evenement->lieu }}</p>
						<a class="button primary" href="{{ route('evenement.show', $evenement->id) }}">Voir l'événement</a>
					</article>
				@empty
					<p>Aucun événement trouvé.</p>
				@endforelse
			</div>
		</section>

		<section class="home-section" aria-labelledby="boutiques-title">
			<h2 id="boutiques-title">Boutiques</h2>
			<div class="grid">
				@forelse ($boutiques as $boutique)
					<article class="card">
						<h3>{{ $boutique->name }}</h3>
						<p>{{ $boutique->description }}</p>
						<a class="button primary" href="{{ route('boutique.show', $boutique->id) }}">Voir la boutique</a>
					</article>
				@empty
					<p>Aucune boutique trouvée.</p>
				@endforelse
			</div>
		</section>
	</main>
	@include('partials.footer')
</body>
</html>
