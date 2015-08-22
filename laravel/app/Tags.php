<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{

    protected $fillable = [
        'name',
        'courses_id',
        'user_id'
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
    public function course(){
        return $this->belongsTo('App\Courses');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions(){
        return $this->belongsToMany('App\Questions');
    }
}
