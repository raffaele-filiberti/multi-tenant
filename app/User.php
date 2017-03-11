<?php

namespace App;

use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use HipsterJazzbo\Landlord\BelongsToTenants;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract

{
    use Authenticatable, CanResetPassword, EntrustUserTrait, BelongsToTenants;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = ['name', 'email', 'password', 'agency_id'];

    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($password)
    {
        if (trim($password) !== '') {
            $this->attributes['password'] = Hash::make($password);
        }
    }

    public function setNameAttribute($name)
    {
        if (trim($name) !== '') {
            $this->attributes['name'] = trim($name);
        }
    }

    public function setEmailAttribute($email)
    {
        if (trim($email) !== '') {
            $this->attributes['email'] = trim($email);
        }
    }

    public function getPermissions($filter = 0)
    {
        if ($filter) {
            return $this->roles()->first()->permissions()->select($filter);
        } else {
            return $this->roles()->first()->permissions();
        }
    }

    public function agency()
    {
        return $this->hasOne('App\Agency');
    }

    public function costumers()
    {
        return $this->belongsToMany('App\Costumer');
    }
}
