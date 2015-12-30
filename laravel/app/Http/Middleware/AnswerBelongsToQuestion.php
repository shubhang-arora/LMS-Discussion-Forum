<?php

namespace App\Http\Middleware;

use Closure;
use App\Questions;
use App\Answers;

class AnswerBelongsToQuestion
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
        $UriExpanded=explode('/',$uri);
        $q_id=$UriExpanded[1];
        $question = Questions::findBySlugOrFail($q_id);
        $a_id = $UriExpanded[3];
        $answer = Answers::findBySlugOrFail($a_id);
        $id = $answer->questions_id;
        if($id!=$question->id)
        {
            return redirect(action('QuestionsController@index'));
        }
        return $next($request);
    }
}
