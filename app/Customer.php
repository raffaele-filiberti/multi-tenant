<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;

class Customer extends Model
{
    use BelongsToTenants;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'name', 'description', 'folder_id'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = empty($name) ?: $name;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }

    public function agency()
    {
        return $this->hasOne(Agency::class);
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
