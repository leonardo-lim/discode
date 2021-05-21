<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function reply()
    {
        return $this->hasMany(Reply::class, 'thread_id', 'id');
    }
}
