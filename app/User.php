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
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use HipsterJazzbo\Landlord\BelongsToTenants;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract

{
    use Authenticatable, CanResetPassword, EntrustUserTrait, BelongsToTenants, Notifiable;

    protected $tenantColumns = ['agency_id'];

    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'cell_phone', 'fax', 'address',
        'cap', 'province', 'city', 'nation', 'ibernate', 'notify', 'subscribed'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = empty($password) ? $this->attributes['password'] : Hash::make($password);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = empty($name) ? $this->attributes['name'] : $name;

    }

    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = empty($email) ? $this->attributes['email'] : $email;
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

    public function customers()
    {
        return $this->belongsToMany('App\Customer');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function receivesBroadcastNotificationsOn()
    {
        return [
            'global'
        ];
    }
}
