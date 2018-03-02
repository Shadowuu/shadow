<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public $table = 'user';

    protected $fillable = ['uid', 'tel', 'pass', 'status'];

    public $timestamps = false;

    public function user_cont()
    {
    	return $this->hasOne('App\Http\Model\user_cont','uid','uid');
    }

    public function mblog()
    {
    	return $this->hasMany('App\Http\Model\mblog','mid', 'uid');
    }
}
