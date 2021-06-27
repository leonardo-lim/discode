<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function thread()
    {
        return $this->hasMany(Thread::class, 'user_id', 'id');
    }

    public function reply()
    {
        return $this->hasMany(Reply::class, 'user_id', 'id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function dislike()
    {
        return $this->hasMany(Dislike::class, 'user_id', 'id');
    }
}
