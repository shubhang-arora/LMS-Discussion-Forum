<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{

    protected $fillable = [
        'course_id',
        'course_name',
        'departments_id',
        'schools_id'
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

    public function department()
    {
        return $this->belongsTo('App\Departments');
    }
}
