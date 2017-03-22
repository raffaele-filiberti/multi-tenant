<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step_Task extends Model
{
    protected $table = 'step_task';

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function step() {
        return $this->belongsTo(Step::class);
    }

    public function details() {
        return $this->belongsToMany(Detail::class, 'detail_step_task','step_task_id', 'detail_id');
    }

}
