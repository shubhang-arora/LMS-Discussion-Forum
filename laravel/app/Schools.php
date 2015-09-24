<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{

    protected $fillable = [
        'school_name'
    ];

    public function departments()
    {
        return $this->hasMany('App\Departments');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
