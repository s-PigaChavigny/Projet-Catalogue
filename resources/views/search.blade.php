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
		<section class="mx-auto max-w-7xl px-6 py-24 lg:py-32">
			<h1 class="max-w-3xl text-5xl font-black leading-tight md:text-7xl">Résultats de la recherche :</h1>
		</section>

		<section class="mx-auto max-w-7xl px-6 pb-20">
			<div class="grid gap-6 md:grid-cols-2">
				@forelse ($requests as $request)
					<div>
                        <h2>{{$request->q}}</h2>

                    </div>
				@empty
					<p class="text-slate-400">Pas de résultat.</p>
				@endforelse
			</div>
		</section>
	</main>

	<footer class="border-t border-white/10 px-6 py-8 text-center text-sm text-slate-500">© {{ date('Y') }} ArtRef</footer>
</body>
</html>
