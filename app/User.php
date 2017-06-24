<?php

namespace App;

use Carbon\Carbon;
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
        'postcode', 'province', 'city', 'nation', 'ibernate', 'notify', 'subscribed'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

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

//    public function setFirstNameAttribute($first_name)
//    {
//        $this->attributes['first_name'] = empty($first_name) ? $this->attributes['first_name'] : $first_name;
//    }
//
//    public function setLastNameAttribute($last_name)
//    {
//        $this->attributes['last_name'] = empty($last_name) ? $this->attributes['last_name'] : $last_name;
//    }
//    public function setCellPhoneAttribute($cell_phone)
//    {
//        $this->attributes['cell_phone'] = empty($cell_phone) ? $this->attributes['cell_phone'] : $cell_phone;
//    }
//    public function setFaxAttribute($fax)
//    {
//        $this->attributes['fax'] = empty($fax) ? $this->attributes['fax'] : $fax;
//    }
//    public function setAddressAttribute($address)
//    {
//        $this->attributes['address'] = empty($address) ? $this->attributes['address'] : $address;
//    }
//    public function setPostcodeAttribute($postcode)
//    {
//        $this->attributes['postcode'] = empty($postcode) ? $this->attributes['postcode'] : $postcode;
//    }
//
//    public function setProvinceAttribute($province)
//    {
//        $this->attributes['province'] = empty($province) ? $this->attributes['province'] : $province;
//    }
//
//    public function setCityAttribute($city)
//    {
//        $this->attributes['city'] = empty($city) ? $this->attributes['city'] : $city;
//    }
//
//    public function setNationAttribute($nation)
//    {
//        $this->attributes['nation'] = empty($nation) ? $this->attributes['nation'] : $nation;
//    }

    public function setIbernateAttribute($ibernate)
    {
        $this->attributes['ibernate'] = empty($ibernate) ? $this->attributes['ibernate'] : $ibernate;
    }

    public function setNotifyAttribute($notify)
    {
        $this->attributes['notify'] = empty($notify) ? $this->attributes['notify'] : $notify;
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
}
