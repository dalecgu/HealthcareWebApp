<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = ['title', 'description', 'begin_time', 'end_time'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_activities', 'activity_id', 'user_id');
    }
}
