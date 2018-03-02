<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    public $table = 'report';

    protected $fillable = ['rid', 'uid', 'cont', 'mid'];

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
