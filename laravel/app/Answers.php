<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Likeable\LikeableTrait;
use Shubhang\DisLikeable\DisLikeableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Answers extends Model implements SluggableInterface
{
    use LikeableTrait;
    use DisLikeableTrait;
    use SluggableTrait;

    protected $fillable = [
       'answer',
        'questions_id'
    ];


    protected $sluggable = [
        'build_from' => 'answer',
        'save_to'    => 'slug',
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
