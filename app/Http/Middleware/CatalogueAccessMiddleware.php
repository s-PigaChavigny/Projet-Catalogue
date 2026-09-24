<?php

namespace App\Http\Middleware;

use App\Models\Catalogue;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CatalogueAccessMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user?->access_level === 'admin') {
            return $next($request);
        }

        abort_unless($user?->access_level === 'artist', 403);

        $boutiqueId = $request->input('boutique_id');
        $catalogueId = $request->route('id');

        if ($catalogueId !== null) {
            $boutiqueId ??= Catalogue::findOrFail($catalogueId)->boutique_id;
        }

        abort_unless((int) $boutiqueId === (int) $user->boutique_id, 403);

        return $next($request);
    }
}