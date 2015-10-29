<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = ['name', 'tag', 'description', 'creator_id'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_groups', 'group_id', 'user_id');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic', 'group_id', 'id');
    }
}
