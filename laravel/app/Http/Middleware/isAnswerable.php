<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Questions;

class isAnswerable
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
        $user_id = Auth::user()->id;
        $uri = $request->path();
        $UriExpanded=explode('/',$uri);
        $q_id=$UriExpanded[1];
        $question = Questions::findBySlugOrFail($q_id);
        $id = DB::table('answers')->where('questions_id','=' ,$question->id)->where('user_id','=',$user_id)->count();
        if($id>=1)
        {
            return redirect(action('QuestionsController@index'));
        }
        return $next($request);
    }
}
