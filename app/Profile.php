<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['age', 'full_name', 'bio', 'gender', 'date_of_birth', 'region', 'photo_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
