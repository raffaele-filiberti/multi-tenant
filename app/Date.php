<?php

namespace App;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use BelongsToTenants;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'data', 'description'
    ];

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }

    public function detail_step_task() {
        return $this->belongsToMany(Detail_Step_Task::class, 'detail_step_task_date', 'date_id','detail_step_task_id')
            ->withPivot('status');
    }
}
