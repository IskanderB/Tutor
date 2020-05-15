<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class HttpsProtocol
{
  public function handle($request, Closure $next){
    // if (empty($_SERVER['HTTPS']) ) {
    if (!$request->secure()) {
      // dd(secure($request->path()));
        return redirect(secure_url($request->path()));
    }
    return $next($request);
  }

  // public function handle($request, Closure $next)
  //   {
  //       if (app()->environment('local')) {
  //           // for Proxies
  //           Request::setTrustedProxies([$request->getClientIp()]);
  //
  //           if (!$request->isSecure()) {
  //               return redirect()->secure($request->getRequestUri());
  //           }
  //       }
  //
  //       return $next($request);
  //   }
}
