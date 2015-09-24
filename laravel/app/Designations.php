<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designations extends Model
{
    //

    protected $fillable = [
        'designation'
    ];


    public function users(){
        return $this->hasMany('App\User');
    }

}
