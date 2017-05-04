<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;

class File extends Model
{
    use BelongsToTenants;
    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'filename', 'description', 'mime', 'path', 'size'
    ];

    public function setFilenameAttribute($filename)
    {
        $this->attributes['filename'] = empty($filename) ? $this->attributes['filename'] : $filename;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }

    public function detail_step_task() {
        return $this->belongsToMany(Detail_Step_Task::class, 'detail_step_task_file', 'file_id','detail_step_task_id')
            ->withPivot('status');
    }

}
