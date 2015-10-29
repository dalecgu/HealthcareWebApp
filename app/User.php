<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
// use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function info()
    {
        if ($this->hasRole('individual')) {
            return $this->hasOne('App\IndividualInfo', 'id', 'id');
        }
        return $this->hasOne('App\UserInfo', 'id', 'id');
    }

    public function friends()
    {
        return $this->hasMany('App\Friend', 'user_id', 'id');
    }

    public function coach()
    {
        return $this->hasOne('App\UserCoach', 'user_id', 'id');
    }

    public function doctor()
    {
        return $this->hasOne('App\UserDoctor', 'user_id', 'id');
    }

    public function moments()
    {
        return $this->hasMany('App\Moment', 'user_id', 'id');
    }

    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'user_activities', 'user_id', 'activity_id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'user_groups', 'user_id', 'group_id');
    }

    public function advices()
    {
        return $this->hasMany('App\Advice', 'user_id', 'id');
    }
}
