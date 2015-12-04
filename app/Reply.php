<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';
    protected $fillable = ['topic_id', 'user_id', 'quote', 'content'];

    public function topic()
    {
        return $this->belongsTo('App\Topic', 'topic_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function agreed_by_users()
    {
        return $this->belongsToMany('App\User', 'agree_replies', 'reply_id', 'user_id');
    }
}
