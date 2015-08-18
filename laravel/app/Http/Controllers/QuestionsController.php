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

       // flash()->success('You have asked a question !!','Nice');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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

    private function syncTags(Questions $questions , array $tags)
    {
        dd($tags);
        $questions->tags()->detach();
        foreach ( $tags as $tag ) {
            $newTags=Tags::firstOrCreate(['name' => $tag]);
            $questions->tags()->attach($newTags);
        }
    }

    private function askQuestion(QuestionRequest $request)
    {
        dd($request->all());
        $questions=Auth::user()->questions()->create($request->all());
        dd($questions);
        $this->syncTags($questions, $request->input('tag_list'));

        dd($questions);
    }
}
