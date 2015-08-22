<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;
use App\Courses;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;

class TagsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin',
            ['except'   =>      'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $tags = Tags::all();
        return view('Tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $courses = Courses::lists('course_name','id');
        return view('Tags.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TagRequest $request)
    {
        //
        $tags=Auth::user()->tags()->create($request->all());
        return redirect(action('TagsController@index'));

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
        $tags = Tags::findorfail($id);
        $courses = Courses::lists('course_name','id');
        return view('Tags.edit',compact(['tags','courses']));
    }


    /**
     * @param Tags $tags
     * @param TagRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Tags $tags,TagRequest $request)
    {
        //


        $tags->update($request->all());

        return redirect(action('TagsController@index'));
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
}
