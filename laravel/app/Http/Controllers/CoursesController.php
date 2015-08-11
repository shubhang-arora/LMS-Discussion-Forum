<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $courses = Courses::all();
        return view('Course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('Course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CourseRequest $request)
    {
        //
        Courses::create($request->all());
        return redirect(action('CoursesController@index'));
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
        $courses = Courses::findorfail($id);
        return view('course.edit',compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CourseRequest $request, $id)
    {
        //
        $courses = Courses::findorfail($id);
        $courses->update($request->all());

        return redirect(action('CoursesController@index'));

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
