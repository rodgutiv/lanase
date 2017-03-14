<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research_Area extends Model
{
    //
    protected $table = "research_areas";

    protected $fillable = ['title_es','title','image','display'];
}
