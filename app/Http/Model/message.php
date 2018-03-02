<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public $table = 'message';

    protected $fillable = ['mid', 'aid', 'uid', 'cont', 'time', 'status'];

    public $timestamps = false;

    public function admins()
    {
    	return $this->hasOne('App\Http\Model\admins','aid','aid');
    }

    public function user_cont()
   	{
   		return $this->hasOne('App\Http\Model\user_cont','uid','uid');
   	}
}
