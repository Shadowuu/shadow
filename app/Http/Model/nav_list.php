<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class nav_list extends Model
{
    public $table = 'nav_list';

    protected $fillable = ['nid', 'name'];

    public $timestamps = false;
}
