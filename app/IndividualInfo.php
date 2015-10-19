<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualInfo extends Model
{
    protected $table = 'individual_info';
    protected $fillable = ['id', 'nickname', 'gendor', 'age', 'birthday', 'location', 'hometown', 'occupation', 'description'];
}
