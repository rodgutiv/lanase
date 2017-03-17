<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = "projects";

    protected $fillable = ['research_area_id','title_es','title','abstract_es','abstract','galleryfolder','display'];
}
