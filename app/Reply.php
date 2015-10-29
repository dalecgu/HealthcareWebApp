<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';
    protected $fillable = ['topic_id', 'user_id', 'content'];

    public function topic()
    {
        return $this->belongsTo('App\Topic', 'topic_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\CommentReply', 'reply_id', 'id');
    }
}
