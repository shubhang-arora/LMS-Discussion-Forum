<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{

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
