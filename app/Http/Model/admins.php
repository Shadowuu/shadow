<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    public $table = 'admins';

    protected $fillable = ['aid', 'name', 'pass', 'sex', 'face'];

    public $timestamps = false;
}
