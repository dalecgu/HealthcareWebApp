<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $table = 'comment_replies';
    protected $fillable = ['reply_id', 'user_id', 'content'];

    public function reply()
    {
        return $this->belongsTo('App\Reply', 'reply_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
