<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ArtRef - Recherche</title>
</head>
<body>
    @include('partials.header')

	<main>
		<section>
			<h1>Résultats pour « {{ $search }} »</h1>
		</section>

		<section aria-labelledby="evenements-title">
			<h2 id="evenements-title">Événements</h2>
			<div>
				@forelse ($evenements as $evenement)
					<article>
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

		<section aria-labelledby="boutiques-title">
			<h2 id="boutiques-title">Boutiques</h2>
			<div>
				@forelse ($boutiques as $boutique)
					<article>
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
