<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    protected $table = 'health';
    protected $fillable = ['user_id', 'year', 'month', 'date', 'sport', 'sleep', 'blood_pressure_low', 'blood_pressure_high', 'heart_rate'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
