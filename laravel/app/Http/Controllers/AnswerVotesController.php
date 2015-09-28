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
        $id = $request->input('id');

        $answer = Answers::findorfail($id);
        if(!$answer->liked())
        {
            $answer->like();
            if($answer->disliked())
            {
                $answer->undislike();
            }
            echo $answer->likeCount." | Upvoted";
        }
        else
        {
            $answer->unlike();
            echo $answer->likeCount." | Upvote";
        }


    }

    public function downVote(Request $request)
    {
        $id = $request->input('id');

        $answer = Answers::findorfail($id);
        if(!$answer->disliked())
        {
            $answer->dislike();
            if($answer->liked())
            {
                $answer->unlike();
            }
            echo $answer->likeCount." | Upvoted";
        }
        else
        {
            $answer->undislike();
            echo $answer->likeCount." | Upvote";
        }
    }
}
