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
<<<<<<< HEAD
        // return $this->belongsToMany(Tag::class, 'tag_thread', 'thread_id', 'tag_id');
        return $this->belongsToMany('App\Tag');
=======
        return $this->belongsToMany(Tag::class, 'tag_thread', 'thread_id', 'tag_id');
>>>>>>> e6eb6a2fcb2dd4d06ba3ef10f0107a87c994fb42
    }
}
