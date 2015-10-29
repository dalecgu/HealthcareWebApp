<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCoach extends Model
{
    protected $table = 'user_coach';
    protected $fillable = ['user_id', 'coach_id'];
}
