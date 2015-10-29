<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moment extends Model
{
    protected $table = 'moments';
    protected $fillable = ['user_id', 'content'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function agreed_by_users()
    {
        return $this->belongsToMany('App\User', 'agree_moments', 'moment_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'moment_id', 'id');
    }
}
