<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use App\User;

class UserMiddleware
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
    $User = Auth::user();
    if ($User) {
      return $next($request);
    }

    return abort('404');
  }
}
