<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Questions;

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
        $question = Questions::findBySlugOrFail($id);
        if($userId!=$question->user_id){
            flash('You Are Not The Owner Of the Question')->important();
            return redirect($uriExpanded[0].'/'.$uriExpanded[1]);
        }

        return $next($request);
    }
}
