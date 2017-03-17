<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncbi_Record extends Model
{
    //
    protected $table = "ncbi_records";

    protected $fillable = ['taxonomy_id','record_name','direct_links','subtree_links','taxonomy_id'];
}
