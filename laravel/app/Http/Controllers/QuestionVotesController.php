<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionVotesController extends Controller
{
    public function upVote(Request $request)
    {
        $id = $request->input('id');
        $question = Questions::findorfail($id);
        if(!$question->liked())
        {
            $question->like();
            echo $question->likeCount." | Upvoted";
        }
        else
        {
            $question->unlike();
            echo $question->likeCount." | Upvote";
        }


    }

    public function downVote()
    {

    }


}
