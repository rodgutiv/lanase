<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    //
    protected $table = "species";

    protected $fillable = ['citation_id','marine','terrestrial','extinct','hybrid','living_period','age_in_days','size_in_mm','mass_in_gram','name_2','habitat','freshwater','name'];
}
