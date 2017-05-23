<?php

namespace App;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use BelongsToTenants;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'folder_id', 'user_id', 'template_id', 'product_manager_id', 'design_type', 'name', 'description', 'country', 'item_number', 'archivied', 'private', 'billed', 'deadline'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = empty($name) ? $this->attributes['name'] : $name;
    }

    public function setItemNumberAttribute($item_number)
    {
        $this->attributes['item_number'] = empty($item_number) ? $this->attributes['item_number'] : $item_number;
    }

    public function setDesignTypeAttribute($design_type)
    {
        $this->attributes['design_type'] = empty($design_type) ? null : $design_type;
    }

    public function setDeadlineAttribute($deadline)
    {
        $this->attributes['deadline'] = empty($deadline) ? $this->attributes['deadline'] : $deadline;
    }

    public function setCountryAttribute($country)
    {
        $this->attributes['country'] = empty($country) ? $this->attributes['country'] : $country;
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

    public function setBilledAttribute($billed)
    {
        $this->attributes['billed'] = empty($billed) ? false : $billed;
    }

    public function agency()
    {
        return $this->hasOne('App\Agency');
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class)
            ->withPivot('id', 'ref_id', 'ref_description', 'status', 'missed', 'expiring_date', 'hidden');
    }

    public function detail_step_task()
    {
        return $this->hasManyThrough(
            Detail_Step_Task::class, Step_Task::class,
            'task_id', 'step_task_id', 'id'
        );
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
