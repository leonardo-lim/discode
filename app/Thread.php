<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reply()
    {
        return $this->hasMany(Reply::class, 'thread_id', 'id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
