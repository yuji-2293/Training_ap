<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\training;
use App\Models\set;
use App\Models\Like;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'other_user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
    public function sets()
    {
    return $this->hasMany(Set::class);
    }
    public function otherUserTrainings()
    {
        return $this->hasMany(Training::class, 'other_user_id');
    }
    
    public function otherUserSets()
    {
        return $this->hasMany(Set::class, 'other_user_id');
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }


}
