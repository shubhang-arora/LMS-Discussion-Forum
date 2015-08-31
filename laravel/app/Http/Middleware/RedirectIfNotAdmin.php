<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class RedirectIfNotAdmin
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
        $id = Auth::user()->id;
        $count = DB::table('admin')->where('user_id',$id)->count();
        if($count!=1)
        {
            return redirect(action('QuestionsController@index'));
        }
        return $next($request);
    }
}
