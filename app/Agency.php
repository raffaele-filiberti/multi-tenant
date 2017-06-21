<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class Agency extends Model
{
    protected $fillable = [
        'name', 'motto', 'description'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = empty($name) ? $this->attributes['name'] : $name;
    }

    public function setMottoAttribute($motto)
    {
        $this->attributes['motto'] = empty($motto) ? null : $motto;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function agency()
    {
        return $this->hasMany(Customer::class);
    }



}
