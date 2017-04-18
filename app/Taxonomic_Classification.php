<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomic_Classification extends Model
{
    //
    protected $table = "taxonomic_classifications";

    protected $fillable = ['id','scientific_name', 'canonic_name','infra_generic','infra_epiteto_specific','rank_marker','modified','specific_epithet','superkingdom','kingdom','phylum','subphylum','superclass','class','subclass','infraclass','superorder','order_2','suborder','infraorder','parvorder','superfamily','family','subfamily','tribe','genus','subgenus','subspecie'];

    /**
     * El metodo es citations porque une con esa table pero la table pivote se llama
     * vernacular_name
     */
    public function citations() {
    	return $this->belongsToMany('App\Citation', 'vernacular_name', 'taxonomy_id', 'citation_id')->withPivot('name', 'language', 'preferred', 'sex', 'life_stage', 'area', 'country', 'plural')->withTimestamps();
    }

    public function external_links(){
    	return $this->hasMany('App\External_Link', 'taxonomy_id');
    }

    public function ncbi_records(){
    	return $this->hasMany('App\Ncbi_Record', 'taxonomy_id');
    }

    public function synonyms(){
    	return $this->hasMany('App\Synonym', 'taxonomy_id');
    }

    public function specimens(){
    	return $this->hasMany('App\Specimen', 'taxonomy_id');
    }
}
