<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'languages_native_id',
        'languages_learn_id',
        'self_introduction',
        'image_path',
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hobbies(){
        // many-to-many relationship
        // user has multiple hobbies
        return $this->belongsToMany(Hobby::class);
    }
    
    
    public function follows()
    {
        return $this->belongsToMany(User::class, "follows", "following_id", "followed_id");
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, "follows", "followed_id", "following_id");
    }
    
}
