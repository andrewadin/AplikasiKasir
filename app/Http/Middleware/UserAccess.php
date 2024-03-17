<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {

        if(auth()->user()->type == $userType){

            return $next($request);

        }
        return redirect()->route('login')
                ->withErrors(
                    [
                        'username' => 'Harus login terlebih dahulu',
                        'password' => 'Harus login terlebih dahulu'
                    ]
                );

        /* return response()->view('errors.check-permission'); */

    }
}
