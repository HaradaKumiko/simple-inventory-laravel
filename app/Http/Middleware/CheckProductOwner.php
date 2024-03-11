<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Product;
use Closure;

class CheckProductOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $productId = $request->route('product_id');
        $product = Product::find($productId);

        if (!$product || $product->user_id !== auth()->id()) {
            return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
