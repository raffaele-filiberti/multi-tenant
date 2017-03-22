<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'data', 'description'
    ];

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }

    public function Detail_Step_Tasks() {
        return $this->belongsToMany(Detail_Step_Task::class, 'detail_step_task_date')
            ->withPivot('status');
    }
}
