<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $fillable = ['group_id', 'user_id', 'title', 'content'];

    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply', 'topic_id', 'id');
    }
}
