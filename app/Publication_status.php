<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication_status extends Model
{
    //
    protected $table = "publication_status";

    protected $fillable = ['specimen_id','pub_status','pub_date'];
}
