<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;

class Costumer extends Model
{
    use BelongsToTenants;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'name', 'description'
    ];

    public function users()
    {
        $this->belongsToMany('App\User');
    }

    public function tasks()
    {
        $this->belongsToMany('App\Task');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = empty($name) ? $this->attributes['name']  : $name;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }
}
