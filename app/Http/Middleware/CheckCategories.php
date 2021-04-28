<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;

class CheckCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Category::all()->count() === 0) {
            return redirect(route('categories.create'))->with('warning', 'You need to make a category first.');
        }
        return $next($request);
    }
}
