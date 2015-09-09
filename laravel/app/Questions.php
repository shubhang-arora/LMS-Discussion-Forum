<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Lanz\Commentable\Commentable;
use Conner\Likeable\LikeableTrait;
class Questions extends Model
{

    use Commentable;
    use LikeableTrait;

    protected $fillable = [
        'question',
        'courses_id',
        'tag_list',
        'description'
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
    public function tags(){
        return $this->belongsToMany('App\Tags');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(){
        return $this->hasMany('App\Answers');
    }

    public function getTagListAttribute()
    {
        return $this->tags()->lists('name')->toArray();
    }
}
