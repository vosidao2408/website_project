<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use File;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public static function authUser()
    {
        if (!Auth::user() == null) {
            $id = Auth::user()->id;
            $user = User::where('id',$id)->first();
            return $user;
        }
        return false;
    }

    public static function filePath()
    {
        $store = File::allFiles(public_path('/images/users'));
        $stores = [];
        for ($i=0;$i < count($store);$i++) {
            $stores[$i] = $store[$i]->getBaseName();
        }
        return $stores;
    }

    public static function imagePath()
    {
        $user = User::all();
        $images = [];
        for ($i=0;$i < count($user);$i++) {
            $images[$i] = $user[$i]->image_path;
        }
        return $images;
    }

    // public static function delFile()
    // {
    //     $stores = User::filePath();
    //     $images = User::imagePath();

    // }
}
