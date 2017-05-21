<?php

namespace App;

use App\Api\V1\Requests\StepRequest;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class Detail extends Model
{
    use BelongsToTenants;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'name', 'description', 'detail_type', 'roled'
    ];

    protected $hidden = [
        'agency_id'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = empty($name) ? $this->attributes['name'] : $name;
    }

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = empty($description) ? null : $description;
    }

    public function agency()
    {
        return $this->hasOne(Agency::class);
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class);
    }

    public function step_task()
    {
        return $this->belongsTo(Step_Task::class);
    }
}
