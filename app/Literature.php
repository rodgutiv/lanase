<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Literature extends Model
{
    //
    protected $table = "literatures";

    protected $fillable = ['citation_id','type_2','remarks'];
}
