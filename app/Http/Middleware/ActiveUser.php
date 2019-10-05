<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ActiveUser
{
  public function handle($request, Closure $next)
  {
    if (Auth::check() && Auth::user()->status) {
      return $next($request);
    }
    Auth::logout();
    return redirect()->back()->with(['flash_level' => 'error', 'flash_message' => t('login.inactive')]);
  }
}
