<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = "projects";

    protected $fillable = ['research_area_id','title_es','title','abstract_es','abstract','display','responsible', 'image'];

    public function research_area(){
    	return $this->belongsTo('App\Research_Area');
    }

    /**
     * El nombre del metodo debe ser diferente al campo de la tabla, sino puede causar ocnflictos al momento de llamarlo
     */
    public function responsable() {
    	return $this->belongsTo('App\User', 'responsible');
    }

    public function datasets() {
    	return $this->hasMany('App\Dataset');
    }

    /**
     * Not shure if it works, Hasmanythrogh relationship
     */

   	public function users() {
   		return $this->hasManyThrough('App\User', 'App\Dataset');
   	}
}
