<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
//    protected $hidden = array('pivot');

     public function roles()
     {
         return $this->belongsToMany('App\roles');
     }
}
