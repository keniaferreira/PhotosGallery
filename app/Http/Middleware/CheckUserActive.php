<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserActive
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
        if(auth()->user()->active == false){
            return redirect('/')->with('error', [                
                'message' => ['Esse usuário precisa ser ativado. Entre em contato com o suporte.']
            ]);
        }

        return $next($request);
    }
}
