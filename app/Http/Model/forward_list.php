<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class forward_list extends Model
{
    public $table = 'forward_list';

    protected $fillable = ['id', 'fid', 'mid', 'uid', 'cont', 'time'];

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
