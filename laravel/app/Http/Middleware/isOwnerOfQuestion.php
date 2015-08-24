<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class isOwnerOfQuestion
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
        $uri = $request->path();
        $uriExpanded=explode('/',$uri);
        $id=$uriExpanded[1];
        $userId=Auth::user()->id;
        $question = DB::table('questions')->where('id','=' ,$id)->first();
        if($userId!=$question->user_id){
            return redirect($uriExpanded[0].'/'.$uriExpanded[1]);
        }
        return $next($request);
    }
}
