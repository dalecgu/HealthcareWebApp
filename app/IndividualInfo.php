<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualInfo extends Model
{
    protected $table = 'individual_info';
    protected $fillable = ['id', 'nickname', 'truename', 'gendor', 'age', 'birthday', 'location', 'email', 'qq', 'description'];
}
