<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    //
    protected $table = "samples";

    protected $fillable = ['specimen_id','user_id','collect_id','sample_type','observations'];
}
