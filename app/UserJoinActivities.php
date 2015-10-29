<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJoinActivities extends Model
{
    protected $table = 'user_activities';
    protected $fillable = ['user_id', 'activity_id'];
}
