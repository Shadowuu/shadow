<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class gods_list extends Model
{
    public $table = 'gods_list';

    protected $fillable = ['gid', 'uid', 'mid', 'status'];

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
