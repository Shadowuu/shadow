<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class mblog extends Model
{
    public $table = 'mblog';

    protected $fillable = ['mid', 'tit', 'cont', 'uid', 'time', 'comment', 'forward', 'gods', 'status', 'hot'];

    public $timestamps = false;

    public function user_cont()
    {
    	return $this->hasOne('App\Http\Model\user_cont','uid','uid');	
    }

    public function cmt_list()
    {
    	return $this->hasMany('App\Http\Model\cmt_list','mid','mid');
    }
}
