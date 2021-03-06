<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Questions;
use Illuminate\Http\Request;
use App\Tags;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isOwnerOfQuestion',['only'=>['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Questions::latest('updated_at')->orderBy('id', 'desc')->get();

        return view('Question.feed',compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function ask()
    {
        $courses = Courses::lists('course_name','id');
        $tags = Tags::lists('name','name')->toArray();
        return view('Question.ask',compact(['courses','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(QuestionRequest $request)
    {

        $this->askQuestion($request);

        $question = Questions::where('question',$request->input('question'))->get();
        $count = Questions::where('question',$request->input('question'))->count();
        flash('Your Question Has Been Posted');
        return redirect(action('QuestionsController@show',$question[$count-1]->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $question = Questions::findBySlugOrFail($id);
        $answers = $question->answers;
        $user_answer = DB::table('answers')->where('user_id',Auth::user()->id)->where('questions_id',$question->id)->get();
        if($user_answer==NULL)
        {
            $aid=-1;

        }
        else
        {
            $aid = $user_answer[0]->id;
        }
        return view('Question.show',compact('question','answers','aid'));
    }


    /**
     * @param Questions $questions
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $question     =       Questions::findBySlugOrFail($id);

        $tags           =       Tags::lists('name','name')->toArray();

        $courses        =       Courses::lists('course_name','id');

        return view('Question.edit',compact(['question','courses','tags']));
    }


    /**
     * @param $id
     * @param QuestionRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id,QuestionRequest $request)
    {

        $questions = Questions::findBySlugOrFail($id);
        $questions->update([
            'courses_id'    =>      $request->input('courses_id'),
            'question'      =>      $request->input('question'),
            'description'   =>      $request->input('description')
        ]);

        $this->syncTags($questions, $request->input('tag_list'),$request->input('courses_id'));
        flash('Your Question Has Been Posted');
        return redirect(action('QuestionsController@show',$questions->slug));
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

    private function syncTags(Questions $questions , array $tags, $courses_id)
    {
        //dd($questions);
        $questions->tags()->detach();

        foreach ( $tags as $tag ) {
            $newTags=Tags::firstOrCreate([
                'name'          =>      $tag,
                'courses_id'    =>      $courses_id,
                'user_id'       =>      Auth::user()->id
            ]);

            $questions->tags()->attach($newTags);

        }
    }

    private function askQuestion(QuestionRequest $request)
    {


        $questions=Auth::user()->questions()->create([
            'courses_id' => $request->input('courses_id'),
            'question' => $request->input('question'),
            'description' => $request->input('description')
        ]);
        $this->syncTags($questions, $request->input('tag_list'),$request->input('courses_id'));
    }

    public function TagQuestions($id)
    {
        $tag = Tags::findorfail($id);
        $questions = $tag->questions;
        return view('Question.tagQuestions',compact('tag','questions'));
    }

    public function CourseQuestions($id)
    {
        $course = Courses::findorfail($id);
        $questions = $course->questions;
        return view('Question.courseQuestions',compact('course','questions'));
    }

}

