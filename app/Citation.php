<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citation extends Model
{
    //
    protected $table= "citations";

    protected $fillable = ['citation','link','identifier'];

    public function medias() {
    	return $this->hasMany('App\Media');
    }

    public function literatures() {
    	return $this->hasMany('App\Literature');
    }

    public function species() {
    	return $this->hasMany('App\Specie');
    }

    /**
     * El metodo es taxonomic_classifications porque une con esa table pero la table pivote se llama
     * vernacular_name
     */
    public function taxonomic_classifications() {
    	return $this->belongsToMany('App\Taxonomic_Classification', 'vernacular_name', 'citation_id', 'taxonomy_id')->withPivot('name', 'language', 'preferred', 'sex', 'life_stage', 'area', 'country', 'plural')->withTimestamps();
    }
}
