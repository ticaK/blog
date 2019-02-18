<?php

namespace App\Http\Middleware;

use Closure;

class CheckAgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->age < 18){
            session()->flash(
                'message','You are too young'
            );
            return redirect()->back();
        }
        return $next($request);
    }
}

//$request->get('age') je isto
//$reguest->input('age')
//only je za niz paraametara, a get samo jedan parametar