<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Departments;
use App\Schools;
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
        $departments = Departments::lists('department_name','id');
        return view('Course.create',compact('schools', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CourseRequest $request)
    {
        Courses::create([
            'course_id'         =>$request->input('course_id'),
            'course_name'       =>$request->input('course_name'),
            'departments_id'    =>$request->input('departments_id')
        ]);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
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
