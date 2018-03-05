<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_fans extends Model
{
    public $table = 'user_fans';

    protected $fillable = ['id', 'fansid', 'uid'];

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
