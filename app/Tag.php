<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function thread()
    {
        return $this->belongsToMany(Thread::class, 'tag_thread', 'thread_id', 'tag_id');
    }
}
