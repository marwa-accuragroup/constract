<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{

    public function Menu()
    {
        return $this->belongsTo('App\Menu' ,'menuId' ,'id');
    }
}
