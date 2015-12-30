<?php

namespace App\Http\Controllers;

use App\Answers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\QuestionAnswerRequest;
use App\Http\Controllers\Controller;
use App\Questions;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class QuestionsAnswersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AnswerBelongsToQuestion',['only' => ['show','edit','update']]);
        $this->middleware('isAnswerable',['only' => ['write', 'store']]);
        $this->middleware('isOwnerOfAnswer',['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(QuestionAnswerRequest $request)
    {

        $uri = $request->path();
        $uriExpanded=explode('/',$uri);
        $question_id=$uriExpanded[1];
        $question = Questions::findBySlugOrFail($question_id);
        $answer = Auth::user()->answers()->create([
            'answer'       =>      $request->input('answer'),
            'questions_id'   =>      $question->id
        ]);

        flash('Your Answer Has been Posted');
        return redirect(action('QuestionsAnswersController@show',[$question_id,$answer->id]));

    }


    /**
     * @param $qid
     * @param $aid
     */
    public function show($qid,$aid)
    {

        $answer = Answers::findBySlugOrFail($aid);
        $question = Questions::findBySlugOrFail($qid);

        $user_answer = DB::table('answers')->where('user_id',Auth::user()->id)->where('slug',$aid)->get();

        if($user_answer==NULL)
        {
            $aid=-1;

        }
        else
        {
            $aid = $user_answer[0]->id;
        }

        return view('Answer.show',compact(['answer','question','aid']));

    }


    /**
     * @param $qid
     * @param $aid
     */
    public function edit($qid,$aid)
    {

        $question= Questions::findBySlugOrFail($qid);
        $answer = Answers::findBySlugOrFail($aid);
        return view('Answer.edit',compact(['question','answer']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(QuestionAnswerRequest $request, $qid,$aid)
    {
        $answer = Answers::findBySlugOrFail($aid);
        $answer->update($request->all());
        flash('Your Answer Has been Edited');
        return redirect(action('QuestionsAnswersController@show',[$qid,$answer->slug]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function write($id)
    {
        $question = Questions::findBySlugOrFail($id);
        return view('Answer.write',compact('question'));
    }
}
