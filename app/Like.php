<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
