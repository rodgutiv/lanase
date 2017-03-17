<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specimen extends Model
{
    //
    protected $table = "specimens"

    protected $fillable = ['taxonomy_id','media_id','literature_id','species_id','metadata_id','identifier_id','collection_id','sequence_id','user_id','family','genus'];
}
