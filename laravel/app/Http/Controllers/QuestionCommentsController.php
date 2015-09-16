<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Lanz\Commentable\Comment;

class QuestionCommentsController extends Controller
{

    /**
     * Displays a list of all the comments for current question.
     *
     * @param Request $request
     *
     *
     */
    public function index(Request $request)
    {
        $id = $request->input('parentID');
        $questions = Questions::find($id);
        $totalComments=$questions->comments()->count();
        $allComments = array();
        for($i=0;$i<$totalComments;$i++){
            $allComments[$i]=$questions->comments[$i]->body;
            echo '<li class="list-group-item">'.$allComments[$i].'</li>';
        }



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
    public function store(Request $request)
    {

        $id=$request->input('parentID');
        $questions = Questions::find($id);

        $comment = new Comment();
        $comment->body = $request->input('comment');
        $comment->user_id = Auth::id();

        $questions->comments()->save($comment);

        echo $comment;
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
}
