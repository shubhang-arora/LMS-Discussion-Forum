<?php

namespace App\Http\Controllers;

use App\Answers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\QuestionAnswerRequest;
use App\Http\Controllers\Controller;
use App\Questions;
use Auth;

class QuestionsAnswersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AnswerBelongsToQuestion',['only' => 'edit', 'update']);
        $this->middleware('isAnswerable',['only' => 'write', 'store']);
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

        $answer = Auth::user()->answers()->create([
            'answer'       =>      $request->input('answer'),
            'questions_id'   =>      $question_id
        ]);
        return redirect(action('QuestionsController@index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id;
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param $qid
     * @param $aid
     */
    public function edit($qid,$aid)
    {

        $question= Questions::findorfail($qid);
        $answer = Answers::findorfail($aid);
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
        $answer = Answers::findorfail($aid);
        $answer->update($request->all());
        return redirect(action('QuestionsController@index'));
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function write($id)
    {
        $question = Questions::findorfail($id);
        return view('Answer.write',compact('question'));
    }
}
