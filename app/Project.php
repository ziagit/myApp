<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
