<?php

namespace App;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use BelongsToTenants;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'name', 'description'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = empty($name) ? $this->attributes['name'] : $name;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class)
            ->withPivot('id', 'ref_id', 'ref_description', 'status', 'missed', 'expiring_date', 'hidden');
    }
}
