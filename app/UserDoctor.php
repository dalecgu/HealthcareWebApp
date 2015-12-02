<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDoctor extends Model
{
    protected $table = 'user_doctor';
    protected $fillable = ['user_id', 'doctor_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
