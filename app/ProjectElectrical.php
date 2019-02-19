<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectElectrical extends Model
{
    public function Project()
    {
        return $this->belongsTo('App\Projects' ,'projectId' ,'id');
    }

}
