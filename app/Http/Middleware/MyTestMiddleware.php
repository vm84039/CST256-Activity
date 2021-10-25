<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\Utility\MyLogger1;
use Illuminate\Support\Facades\Cache;

class MyTestMiddleware
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
        $logger->info("MyTestMiddleware was called.");
        
        $username = $request->input('username');
        $password = $request->input('password');
        if(isset($username))
        {
            Cache::put('mydata', $username, 60); // store for 1 min
            Cache::put('mydata2', $password, 60); // store for 1 min
            
            $logger->info("Username - " . $username . " - stored in cache");
        }
        else
        {
            if(Cache::has('mydata'))
            {
                $logger->info('Cache returned a value for mydata');
            }
            else
            {
                $logger->info('Cache did not return a value for mydata');
            }
        }
        return $next($request);
    }
}