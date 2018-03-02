<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    public $table = 'notice';

    public $timestamps = false;

    protected $fillable = ['id', 'tit', 'cont', 'time'];

    
}
