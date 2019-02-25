<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class MaintenanceMode
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
        $maintenanceModeValue=DB::table('configurations')->where('name','maintenance')->first()->value;

        if ($maintenanceModeValue=="off"){
            return $next($request);
        } else {
            return redirect('/maintenance');
        }
        
        return $next($request);
    }
}
