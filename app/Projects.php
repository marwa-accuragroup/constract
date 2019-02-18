<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function Contractor()
    {
        return $this->belongsTo('App\Contractor' ,'contractorName' ,'id');
    }

    public function Beneficiaries()
    {
        return $this->belongsTo('App\Beneficiaries' ,'beneficiaries' ,'id');
    }
}
