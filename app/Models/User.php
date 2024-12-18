<?php

namespace App\Models;

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

    //Added a function related to retrieve role and color. This is used in the club.display
    public function getRoleInClub($clubId)
    {
        return $this->clubMemberships()->where('club_id', $clubId)->first()->role ?? 'member';
    }

    public function getRoleColor(string $role): string
    {
        return match ($role) {
            'leader' => 'text-red-500',
            //I don't know why indigo is not working
            'faculty' => 'text-indigo-700',
            'member' => 'text-blue-500',
            default => 'text-gray-500',
        };
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

    public function clubRequests()
    {
        return $this->hasMany(JoinRequest::class, 'responder_id');
    }


    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
