<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function articles(){
        return $this->hasMany('App\Article');
    }
}
