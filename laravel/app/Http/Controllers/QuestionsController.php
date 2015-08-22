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

class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return Auth::user()->email;
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

        //flash()->success('You have asked a question !!','Nice');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param Questions $questions
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $questions      =       Questions::findorfail($id);

        $tags           =       Tags::lists('name','name')->toArray();

        $courses        =       Courses::lists('course_name','id');

        return view('Question.edit',compact(['questions','courses','tags']));
    }


    /**
     * @param $id
     * @param QuestionRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id,QuestionRequest $request)
    {

        $questions = Questions::findorfail($id);
        $questions->update([
            'courses_id'    =>      $request->input('courses_id'),
            'question'      =>      $request->input('question'),
            'description'   =>      $request->input('description')
        ]);

        $this->syncTags($questions, $request->input('tag_list'),$request->input('courses_id'));
        return redirect('/');
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
}
