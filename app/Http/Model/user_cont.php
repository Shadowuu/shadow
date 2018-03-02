<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_cont extends Model
{
    public $table = 'user_cont';

    protected $fillable = ['id', 'name', 'face', 'sex', 'age', 'email', 'uid'];

    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('App\Http\Model\user','uid');
    }

    public function mblog()
    {
    	return $this->hasMany('App\Http\Model\mblog','mid','uid');
    }
}
