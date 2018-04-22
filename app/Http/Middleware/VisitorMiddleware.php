<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorMiddleware
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
        if(!Sentinel::check())
            return $next($request);
        else
            if(Sentinel::getUser()->roles()->first()->slug == 'superAdmin')
                return redirect()->route('superAdmin.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'admin')
                return redirect()->route('admin.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'doctor')
                return redirect()->route('doctor.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'midwife')
                return redirect()->route('midwife.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'healthAnalyst')
                return redirect()->route('healthAnalyst.dashboard');
            elseif(Sentinel::getUser()->roles()->first()->slug == 'pharmacist')
                return redirect()->route('pharmacist.dashboard');
            else
                return abort(404);
    }
}
