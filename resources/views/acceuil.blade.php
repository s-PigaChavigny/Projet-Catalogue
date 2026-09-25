<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ArtRef - Accueil</title>
</head>
<body>
    @include('partials.header')

	<main>
		<section>
			<h1>Bienvenue dans le catalogue ArtRef!</h1>
			<p>Le site de référence pour tous les évenements d'artistes!</p>
		</section>

		<section>
			<div>
				<h2 class="mt-2 text-3xl font-bold">Evenements récents</h2></div>
				@if($evenements->isEmpty())
                    <p class="text-slate-400">Aucun événement récent pour le moment.</p>
                @else
					@foreach($evenements as $evenement)
                        <div>
							<h3>{{ $evenement->name }}</h3>
                            <p>{{ $evenement->description ?? 'Découvrez cet événement dans notre sélection.' }}</p>
							<p>Date: {{ $evenement->date ?? 'Prochainement' }}</p>
                        </div>
                    @endforeach
                @endif
				<a href="{{ url('/evenement') }}">Voir tous les évenements →</a>
			</div>
		</section>

		<section>
			<div>
				<h2>Les Artistes</h2>
				<div>
					@forelse($boutiques as $boutique)
						<article>
							<h3>{{ $boutique->name }}</h3>
							<p>{{ $boutique->description ?? 'Artiste à découvrir.' }}</p></article>
					@empty
						<p class="text-slate-400">Les artistes seront bientôt présentés.</p>
					@endforelse
				</div>
                <a href="{{ url('/boutique') }}">Voir tous les artistes →</a>
			</div>
		</section>
	</main>

	@include('partials.footer')
</body>
</html>
