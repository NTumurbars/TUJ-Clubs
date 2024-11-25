<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
    ];
    
    //Club will have many members

    //Changed this from clubMembership to just membership since we already know this is club
    public function memberships()
    {
        return $this->hasMany(ClubMembership::class);
    }

    //Clubs will belong to many users and also many users will belong to clubs.
    //I learned that belongs to many is a way to add joining table
    public function users()
    {
        return $this->belongsToMany(User::class, 'club_memberships')
                    //it's probably good to have role accessible
                    ->withPivot('role')
                    //also timestamps but I don't know
                    ->withTimestamps();
    }

    //posts will be just hasmany relationship
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //There will be 1 form per club. /for now the form is only being used by club reques. But if we use it in a dfferent way we can change it/
    public function joinForm()
    {
        return $this->hasOne(JoinForm::class);
    }

    //clubrequests is also hasmany relationship
    public function clubRequests()
    {
        return $this->hasMany(JoinRequest::class);
    }

    public function isMember(User $user): bool
    {
        return $this->memberships()
            ->where('user_id', $user->id)
            ->exists();
    }
}
