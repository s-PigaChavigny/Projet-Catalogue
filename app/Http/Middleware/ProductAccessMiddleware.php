<?php

namespace App\Http\Middleware;

use App\Models\Produit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductAccessMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user?->access_level === 'admin') {
            return $next($request);
        }

        abort_unless($user?->access_level === 'artist', 403);

        $productId = $request->route('id');
        if ($productId !== null) {
            $product = Produit::findOrFail($productId);
            abort_unless((int) $product->boutique_id === (int) $user->boutique_id, 403);
        }

        $boutiqueId = $request->input('boutique_id');
        if ($boutiqueId !== null) {
            abort_unless((int) $boutiqueId === (int) $user->boutique_id, 403);
        }

        return $next($request);
    }
}