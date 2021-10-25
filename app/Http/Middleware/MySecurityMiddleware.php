<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Utility\MyLogger1;
use Illuminate\Http\Request;

class MySecurityMiddleware
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
        $logger = new MyLogger1();
        $path = $request->path();
        $logger->info("Entering My Security Middleware in handle() at path: " . $path);
        $secureCheck = true;
        if ($request->is('/') || $request->is('login3') || $request->is('dologin3') ||
            $request->is('usersrest') || $request->is('usersrest/*') ||
            $request->is('loggingservice'))
        { $secureCheck = false;}
        $logger->info($secureCheck ? "Security Middleware in handle().....Needs Security" : "Security Middleware in handle().....No Security Required");
        if($secureCheck)
        {
            $logger->info("Leaving My Security Middleware in handle() doing a redirect back to login");
            return redirect('/login3');
        }
        
        
        return $next($request);
    }
}
