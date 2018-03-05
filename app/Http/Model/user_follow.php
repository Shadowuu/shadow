<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_follow extends Model
{
    public $table = 'user_follow';

    protected $fillable = ['id', 'fid', 'uid'];

    public $timestamps = false;

    public function user_cont()
   	{
   		return $this->hasOne('App\Http\Model\user_cont','uid','fid');
   	}

   	public function mblog()
   	{
   		return $this->hasMany('App\Http\Model\mblog','mid','fid');
   	}
}
