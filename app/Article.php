<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'address', 'contact', 'status', 'image_path'
    ];
    public function districts(){
        return $this->belongsTo('App\District');
    }
    public function users(){
        return $this->belongsTo('App\User','id_user');
    }
}
