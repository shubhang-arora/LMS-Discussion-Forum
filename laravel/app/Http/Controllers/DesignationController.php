<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Designations;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DesignationRequest;
use App\Http\Controllers\Controller;
use App\Schools;

class DesignationController extends Controller
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
        $designations = Designations::all();
        return view('Designation.index',compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Designation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(DesignationRequest $request)
    {
        Designations::create($request->all());
        return redirect(action('DesignationController@index'));
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

    public function assign()
    {
        $users = User::lists('name','id');
        $schools = Schools::lists('school_name','id');
        $departments = Departments::lists('department_name','id');
        $designations = Designations::lists('designation','id');
        return view('Designation.assign',compact('schools', 'departments', 'designations', 'users'));
    }

    public function assigned()
    {

    }
}
