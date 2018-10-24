<?php

namespace App\Http\Middleware;

use Closure;

class HantingArea
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $user_areas;
    public function handle($request, Closure $next)
    {
        $this->user_areas = HuntingArea::with('userGroups')->whereHas('userGroups', function($query){
            $query->whereIn('user_group_id', auth()->user()->userGroups->pluck('id'));
        })->get();
        return $next($request);
    }
}
