<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ArtRef - Accueil</title>
</head>
<body>
    @include('partials.header')

	<main class="home-main">
		<section class="home-intro">
			<h1>Bienvenue dans le catalogue ArtRef!</h1>
			<p>Le site de référence pour tous les évenements d'artistes!</p>
		</section>

		<section class="home-section" aria-labelledby="events-title">
			<div class="home-section-heading home-evenement">
				<h2 id="events-title">Événements récents</h2>
				<a class="button primary" href="{{ url('/evenement') }}">Voir tous les événements</a>
			</div>

			@if($evenements->isEmpty())
				<p class="home-empty">Aucun événement récent pour le moment.</p>
			@else
				<div class="home-grid">
					@foreach($evenements as $evenement)
						<article class="home-card card-evenement">
							<span class="home-card-tag">Événement</span>
							<h3>{{ $evenement->name }}</h3>
							<p>{{ $evenement->description ?? 'Découvrez cet événement dans notre sélection.' }}</p>
							<p class="home-card-meta"><strong>Date :</strong> {{ $evenement->date ?? 'Prochainement' }}</p>
						</article>
					@endforeach
				</div>
			@endif
		</section>

		<section class="home-section" aria-labelledby="shops-title">
			<div class="home-section-heading home-boutique">
				<h2 id="shops-title">Les artistes</h2>
				<a class="button secondary" href="{{ url('/boutique') }}">Voir toutes les boutiques</a>
			</div>

			@if($boutiques->isEmpty())
				<p class="home-empty">Les artistes seront bientôt présentés.</p>
			@else
				<div class="home-grid">
					@foreach($boutiques as $boutique)
						<article class="home-card  card-boutique">
							<span class="home-card-tag">Boutique</span>
							<h3>{{ $boutique->name }}</h3>
							<p>{{ $boutique->description ?? 'Artiste à découvrir.' }}</p>
						</article>
					@endforeach
				</div>
			@endif
		</section>
	</main>

	@include('partials.footer')
</body>
</html>
