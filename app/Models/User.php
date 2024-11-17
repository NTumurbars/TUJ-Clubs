<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'is_admin', // we dont need it here. We can directly specify that in the clubmembershpi table
        'profile_photo_link',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      
        'remember_token',
    ];



    public function clubMemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }

    //reverse of the users in club class. pretty much same.
    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'club_memberships')
                    ->withPivot('role')
                    ->withTimestamps();
    }


    //Users can have many of these things.
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function formResponses()
    {
        return $this->hasMany(FormResponse::class);
    }

    public function clubRequests()
    {
        return $this->hasMany(ClubRequest::class, 'responder_id');
    }


    public function isAdmin(): bool
    {
        return $this->is_admin;
    }


}
