<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'id_district';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
}
