<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Synonym extends Model
{
    //
    protected $table = "synonyms";

    protected $fillable = ['taxonomy_id','synonym']
}
