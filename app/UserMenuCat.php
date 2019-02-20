<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMenuCat extends Model
{
    public function Cateory()
    {
        return $this->belongsTo('App\Cateory' ,'catId' ,'id');
    }
}
