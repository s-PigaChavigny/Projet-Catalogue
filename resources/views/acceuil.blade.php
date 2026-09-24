<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ArtRef — Accueil</title>
</head>
<body>

	@php
		$evenementsRecents = collect($evenement ?? $event ?? [])->sortByDesc('date')->take(2);
		$artistesAleatoires = collect($artiste ?? $artist ?? [])->shuffle()->take(3);
	@endphp

	<main>
		<section class="mx-auto max-w-7xl px-6 py-24 lg:py-32">
			<!--<p class="mb-5 text-sm font-bold uppercase tracking-[.3em] text-fuchsia-400">AAAA</p>-->
			<h1 class="max-w-3xl text-5xl font-black leading-tight md:text-7xl">Bienvenue dans le catalogue ArtRef!</h1>
			<p class="mt-7 max-w-2xl text-lg leading-8 text-slate-400">Le site de référence pour tous les artistes de conventions!</p>
		</section>

		<section class="mx-auto max-w-7xl px-6 pb-20">
			<div class="mb-8 flex items-end justify-between">
				<div><p class="text-sm uppercase tracking-widest text-fuchsia-400">Consultez toutes vos conventions préférées</p><h2 class="mt-2 text-3xl font-bold">Conventions récentes</h2></div>
				<a href="{{ url('/evenement') }}" class="text-sm text-slate-400 hover:text-white">Voir tout →</a>
			</div>
			<div class="grid gap-6 md:grid-cols-2">
				@forelse($evenementsRecents as $evenement)
					<article class="overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-6 hover:border-fuchsia-400/50">
						<p class="text-sm text-fuchsia-400">{{ optional($evenement->date ?? null)->format('d/m/Y') ?? ($evenement->date ?? 'Prochainement') }}</p>
						<h3 class="mt-3 text-2xl font-bold">{{ $evenement->nom ?? $evenement->title ?? 'Événement' }}</h3>
						<p class="mt-3 text-slate-400">{{ $evenement->description ?? 'Découvrez cet événement dans notre sélection.' }}</p>
					</article>
				@empty
					<p class="text-slate-400">Les prochains événements seront bientôt annoncés.</p>
				@endforelse
			</div>
		</section>

		<section class="bg-white/5 py-20">
			<div class="mx-auto max-w-7xl px-6">
				<p class="text-sm uppercase tracking-widest text-fuchsia-400">Notre sélection</p><h2 class="mt-2 text-3xl font-bold">Artistes à la une</h2>
				<div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
					@forelse($artistesAleatoires as $artiste)
						<article class="rounded-2xl border border-white/10 bg-slate-900 p-6"><div class="mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-fuchsia-500/20 text-2xl font-bold text-fuchsia-400">{{ strtoupper(substr($artiste->nom ?? $artiste->name ?? 'A', 0, 1)) }}</div><h3 class="text-xl font-bold">{{ $artiste->nom ?? $artiste->name ?? 'Artiste' }}</h3><p class="mt-2 text-slate-400">{{ $artiste->biographie ?? $artiste->description ?? 'Artiste à découvrir.' }}</p></article>
					@empty
						<p class="text-slate-400">Les artistes seront bientôt présentés.</p>
					@endforelse
				</div>
			</div>
		</section>
	</main>

	<footer class="border-t border-white/10 px-6 py-8 text-center text-sm text-slate-500">© {{ date('Y') }} Catalogue — Tous les talents au même endroit.</footer>
</body>
</html>
