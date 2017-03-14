<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    //
    protected $table = 'metrics';

    protected $fillable = ['datasetkey','count_usages','count_synonyms','count_names','count_col','count_nub','count_by_rank','count_by_kingdom','count_by_origin','count_vernacular_by_lang','count_extensions','count_other','downloaded','created','latest','count_by_issue','count_by_constituent'];
}
