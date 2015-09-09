<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnswerVotesController extends Controller
{
    public function upVote(Request $request)
    {
        $i = $request->input('id');

        $answer = Answers::findorfail($i);
        if(!$answer->liked())
        {
            $answer->like();
            echo $answer->likeCount." | Upvoted";
        }
        else
        {
            $answer->unlike();
            echo $answer->likeCount." | Upvote";
        }


    }

    public function downVote()
    {

    }
}
