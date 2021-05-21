<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = ['content'];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
