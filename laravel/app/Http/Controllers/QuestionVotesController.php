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
            if($question->disliked())
            {
                $question->undislike();
            }
            echo $question->likeCount." | Upvoted";
        }
        else
        {
            $question->unlike();
            echo $question->likeCount." | Upvote";
        }


    }

    public function downVote(Request $request)
    {
        $id = $request->input('id');
        $question = Questions::findorfail($id);
        if(!$question->disliked())
        {
            $question->dislike();
            if($question->liked())
            {
                $question->unlike();
            }
            echo $question->dislikeCount." | Downvoted";
        }
        else
        {
            $question->undislike();
            echo $question->dislikeCount." | Downvote";
        }
    }


}
