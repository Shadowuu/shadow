<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class cmt_list extends Model
{
    public $table = 'cmt_list';

    protected $fillable = ['cid', 'mid', 'uid', 'uuid','cont', 'time'];

    public $timestamps = false;

    public function user_cont()
   	{
   		return $this->hasOne('App\Http\Model\user_cont','uid','uid');
   	}

   	public function mblog()
   	{
   		return $this->hasMany('App\Http\Model\mblog','mid','mid');
   	}
}
