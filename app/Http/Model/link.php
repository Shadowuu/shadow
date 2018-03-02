<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    public $table = 'link';

    public $timestamps = false;

    protected $fillable = ['lid', 'tit', 'url', 'time', 'status'];
}
