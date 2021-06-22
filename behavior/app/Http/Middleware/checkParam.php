<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class checkParam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param, $param_2)
    {
        //user esta logado
        //attr que armazena
        //if(attr == param) ? next(request) : redirect(login)

        Log::info('Foi invocado o meu primeiro middleware! [' . $param . ' - ' . $param_2 . ']');
        Log::info('Teste 1');

        $process = $next($request);
        Log::info('Teste 3');
        return $process;
    }
}
