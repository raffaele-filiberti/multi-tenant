<?php

namespace App;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Step_Task extends Model
{

    protected $table = 'step_task';

    protected $fillable = [
        'ref_id', 'status', 'missed', 'ref_description', 'expiring_date', 'hidden'
    ];

    public function setExpiringDateAttribute($expiring_date)
    {
        $this->attributes['expiring_date'] = empty($expiring_date) ? $this->attributes['expiring_date'] : $expiring_date;
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function step() {
        return $this->belongsTo(Step::class);
    }

    public function details() {
        return $this->belongsToMany(Detail::class, 'detail_step_task','step_task_id', 'detail_id');
    }

    public function detail_step_task() {
        return $this->hasMany(Detail_Step_Task::class, 'detail_step_task', 'step_task_id', 'detail_id');
    }

}
