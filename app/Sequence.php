<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    //
    protected $table = "sequences";

    protected $fillable = ['path', 'specimen_id', 'desc_2'];

    public function specimen() {
    	return $this->belongsTo('App\Specimen');
    }
}
