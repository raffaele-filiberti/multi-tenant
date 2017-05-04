<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Step_Task extends Model
{
    protected $table = 'detail_step_task';

    public function step_task() {
        return $this->belongsTo(Step_Task::class);
    }

    public function detail() {
        return $this->belongsTo(Detail::class);
    }

    public function files() {
        return $this->belongsToMany(File::class, 'detail_step_task_file','detail_step_task_id','file_id')
            ->withPivot('status');
    }

    public function dates() {
        return $this->belongsToMany(Date::class, 'detail_step_task_date','detail_step_task_id','date_id')
            ->withPivot('status');
    }
}
