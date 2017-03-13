<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class Agency extends Model
{
    protected $fillable = [
        'name', 'motto', 'description'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    // TODO: filtro per agenzie che danno la possibilità di invitarsi

    public function setNameAttribute($name)
    {
        $this->attributes['motto'] = empty($name) ?: $name;
    }

    public function setMottoAttribute($motto)
    {
        $this->attributes['motto'] = empty($motto) ? null : $motto;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }
}
