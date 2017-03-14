<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest_Field extends Model
{
    //
    protected $table = "interest_fields";

    protected $fillable = ['interest_tables_id', 'interest_tables_id','cascade','field_name','equivalent_name'];
}
