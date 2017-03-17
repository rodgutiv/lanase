<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specimen extends Model
{
    //
    protected $table = "specimens"

    protected $fillable = ['taxonomy_id','media_id','literature_id','species_id','metadata_id','identifier_id','collection_id','sequence_id','user_id','family','genus'];

    public function identifier(){
    	return $this->belongsTo('App\Identifier');
    }

    public function collection(){
    	return $this->belongsTo('App\Collection');
    }

    public function sequence(){
    	return $this->belongsTo('App\Sequence');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function samples(){
    	return $this->hasMany('App\Sample');
    }

    public function distributions(){
    	return $this->hasMany('App\Distribution');
    }

    public function media(){
    	return $this->belongsTo('App\Media');
    }

    public function literature(){
    	return $this->belongsTo('App\Literature');
    }

    public function specie(){
    	return $this->belongsTo('App\Specie');
    }

    public function metadata(){
    	return $this->belongsTo('App\Metadata');
    }

    public function taxonomic_classification(){
    	return $this->belongsTo('App\Taxonomic_Classification', 'taxonomy_id');
    }

    public function images(){
    	return $this->hasMany('App\Image');
    }

    public function publication_status(){
    	return $this->hasOne('App\Publication_Status');
    }
}
