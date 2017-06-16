<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research_Area extends Model
{
    //
    protected $table = "research_areas";

    protected $fillable = ['title_es','title','display'];

    public function projects() {
    	return $this->hasMany('App\Project', 'research_area_id');
    }
}
