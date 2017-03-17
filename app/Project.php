<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = "projects";

    protected $fillable = ['research_area_id','title_es','title','abstract_es','abstract','galleryfolder','display'];

    public function research_area(){
    	return $this->belongsTo('App\Research_Area');
    }

    public function users(){
    	return $this->belongsToMany('App\User')->withPivot('order_2', 'responsible')->withTimestamps();
    }
}
