<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreeMoment extends Model
{
    protected $table = 'agree_moments';
    protected $fillable = ['user_id', 'moment_id'];
}
