<?php

namespace App\Models;

use App\Notifications\SandVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_USER = 1;

    public static function getRoles()
    {
        return[
          self::ROLE_ADMIN => 'Admin',
          self::ROLE_USER => 'User',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
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

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SandVerifyWithQueueNotification());
    }

    public function favoritesPosts()
    {
        return $this->belongsToMany(Post::class,'post_user_favorites','user_id','post_id');
    }

    public function comment()
    {
       return $this->hasMany(Comment::class,'user_id','id');
    }
}
