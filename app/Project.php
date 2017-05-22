<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;

class Project extends Model
{
    use BelongsToTenants;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'folder_id', 'user_id', 'name', 'description', 'archivied', 'private'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = empty($name) ? $this->attributes['name'] : $name;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }

    public function setPrivateAttribute($private)
    {
        $this->attributes['private'] = empty($private) ? false : $private;
    }

    public function setArchiviedAttribute($archivied)
    {
        $this->attributes['archivied'] = empty($archivied) ? false : $archivied;
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
