<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkRequest extends Model
{
    public function WorkCat()
    {
        return $this->belongsTo('App\WorkCat' ,'workCatId' ,'id');
    }
}
