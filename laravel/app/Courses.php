<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{

    protected $fillable = [
        'course_id',
        'course_name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(){
        return $this->hasMany('App\Questions');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags(){
        return $this->hasMany('App\Tags');
    }

    public function designations()
    {
        return $this->hasMany('App\Designations');
    }
}
