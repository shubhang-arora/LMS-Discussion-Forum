<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Conner\Likeable\LikeableTrait;

class VoteController extends Controller
{
    public function upVote(Request $request)
    {
        $i = $request->input('id');
        $question = Questions::findorfail($i);
        $question->like();
    }

    public function downVote()
    {

    }

    public function undoDownVote()
    {

    }

    public function undoUpVote()
    {

    }
}
