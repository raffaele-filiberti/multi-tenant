<?php

namespace App;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
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

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function details()
    {
        return $this->belongsToMany(Detail::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)
            ->withPivot('id', 'ref_id', 'ref_description', 'status', 'missed', 'expiring_date', 'hidden');
    }

}
