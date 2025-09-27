<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_activity',
        'location',
        'website',
        'bio'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function likedForums()
    {
        return $this->belongsToMany(Forum::class, 'forum_likes')->withTimestamps();
    }

    public function savedForums()
    {
        return $this->belongsToMany(Forum::class, 'saved_forums')->withTimestamps();
    }

        // One latest profile picture
    public function profilePicture(): HasOne
    {
        return $this->hasOne(UserProfilePicture::class)->latestOfMany();
    }

    // If you want to keep history of all pictures
    public function profilePictures(): HasMany
    {
        return $this->hasMany(UserProfilePicture::class);
    }
}
