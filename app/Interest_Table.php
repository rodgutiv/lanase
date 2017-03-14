<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest_Table extends Model
{
    //
    protected $table = "interest_tables";

    protected $fillable = ['table_name'];
}
