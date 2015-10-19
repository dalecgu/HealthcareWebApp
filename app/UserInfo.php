<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';
    protected $fillable = ['id', 'nickname', 'gendor', 'age', 'location', 'company', 'description'];
}
