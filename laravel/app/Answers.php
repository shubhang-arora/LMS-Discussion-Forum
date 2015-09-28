<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Likeable\LikeableTrait;
use Shubhang\DisLikeable\DisLikeableTrait;
class Answers extends Model
{
    use LikeableTrait;
    use DisLikeableTrait;

    protected $fillable = [
       'answer',
        'questions_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(){
        return $this->belongsTo('App\Questions');
    }

}
