<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomic_Classification extends Model
{
    //
    protected $table = "taxonomic_classifications";

    protected $fillable = ['scientific_name', 'canonic_name','infra_generic','infra_epiteto_specific','rank_marker','modified','specific_epithet','superkingdom','kingdom','phylum','subphylum','superclass','class','subclass','infraclass','superorder','order_2','suborder','infraorder','parvorder','superfamily','family','subfamily','tribe','genus','subgenus','subspecie'];
}
