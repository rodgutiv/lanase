<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class External_Link extends Model
{
    //
    protected $table = "external_links";

    protected $fillable = ['taxonomy_id','provider_name','provider_abbr','url','subject','category','attribute'];
}
