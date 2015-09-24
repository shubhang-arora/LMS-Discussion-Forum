<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{

    protected $fillable = [
        'schools_id',
        'department_name'
    ];

    public function school()
    {
        return $this->belongsTo('App\Schools');
    }

    public function courses()
    {
        return $this->hasMany('App\Courses');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
