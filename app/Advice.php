<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $table = 'advices';
    protected $fillable = ['user_id', 'advisor_id', 'content'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function advisor()
    {
        return $this->belongsTo('App\User', 'advisor_id', 'id');
    }
}
