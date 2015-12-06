<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreeReply extends Model
{
    protected $table = 'agree_replies';
    protected $fillable = ['user_id', 'reply_id'];
}
